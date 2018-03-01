document.addEventListener("DOMContentLoaded", function () {

    var quantity_input = document.querySelectorAll("span.number");
    var minus = document.querySelectorAll("span.minus");
    var plus = document.querySelectorAll("span.plus");

    var quantity = "";
    var price_input = "";
    var price = "";

    var size_labels = [];
    var def_size = "";

    var size_price = {};
    var def = "";

    //var def_price = "";

    var prices = {
        s: {add: 0},
        m: {add: 10},
        l: {add: 25}
    };

    /// FUNCTION to summarize price
    /// --- get price values from each item and sum
    function SumPrice() {
        if (document.querySelector("input#sum-price")) {

            var sum = 0;
            var sum_arr = [];
            var all_prices = document.querySelectorAll("input.price-value");

            all_prices.forEach(function (value) {
                var get_price = parseInt(value.getAttribute("value").split("€")[0]);
                sum_arr.push(get_price);
            })
            for (var i = 0; i < sum_arr.length; i++) {
                sum += sum_arr[i];
            }

            document.querySelector("input#sum-price").setAttribute("value", sum + "€");
        }
    }

    quantity_input.forEach(function (t) {

        var item_id = t.parentNode.parentNode.parentNode.parentNode.querySelector("input.item-key").getAttribute("value");

        function updateCart(post_price, post_quant, post_size) {
            if (document.querySelector(".main__title h1 span") && document.querySelector(".main__title h1 span").innerHTML == "cart") {
                jQuery.post("update_cart", {
                    update_cart: 'isset',
                    cart_item_id: item_id,
                    price: post_price,
                    quantity: post_quant,
                    size: post_size
                });
            }
        }


        var def_price = parseInt(t.parentNode.parentNode.parentNode.nextElementSibling.querySelector("input.price-value").getAttribute("data-default"));


        t.addEventListener("blur", function (e) {
            quantity = e.target.innerHTML;
            t.parentNode.parentNode.parentNode.nextElementSibling.querySelector("input.price-value").setAttribute("value", def_price * quantity + "€");

            var post_price = parseInt(t.parentNode.parentNode.parentNode.nextElementSibling.querySelector("input.price-value").getAttribute("value").split("€")[0]);
            var post_size = t.parentNode.parentNode.parentNode.previousElementSibling.querySelector("input:checked").getAttribute("value");

            updateCart(post_price, quantity, post_size);

            SumPrice();

        });

        size_labels = t.parentNode.parentNode.parentNode.previousElementSibling.querySelectorAll("label.def-label");
        def_size = t.parentNode.parentNode.parentNode.previousElementSibling.querySelector("input:checked").getAttribute("value");


        size_price[item_id] = {};
        size_price[item_id].options = [];

        for (var i = 0; i < size_labels.length; i++) {
            if (size_labels[i].getAttribute("for").split("-")[1].split(":")[0] == def_size) continue;

            var labelsize_i = size_labels[i].getAttribute("for").split("-")[1].split(":")[0];

            def = def_size + "-" + def_price;
            size_price[item_id].def = def;



            var add = labelsize_i + "-" + (parseInt(def_price) + prices[labelsize_i]['add'] - prices[def_size]['add']);

            size_price[item_id].options.push(add);

        }


        size_labels.forEach(function (t2) {


            t2.addEventListener("click", function (e) {


                var curr_size = e.target.getAttribute("for").split("-")[1].split(":")[0];

                var click_price = "";

                if (size_price[item_id].def.indexOf(curr_size) !== -1) {

                    click_price = size_price[item_id].def.split("-")[1];


                } else {
                    for (var i = 0; i < size_price[item_id].options.length; i++) {
                        if (size_price[item_id].options[i].indexOf(curr_size) !== -1) {
                            click_price = size_price[item_id].options[i].split("-")[1];
                        }
                    }
                }
                /*else if (size_price[item_id].options.indexOf(curr_size) !== -1) {
                                   click_price = size_price[item_id].options.split("-")[1];
                                   console.log(size_price[item_id]);
                               }*/
                t.parentNode.parentNode.parentNode.nextElementSibling.querySelector("input.price-value").setAttribute("data-default", click_price);
                t.parentNode.parentNode.parentNode.nextElementSibling.querySelector("input.price-value").setAttribute("value", click_price * t.innerHTML + "€");
                def_price = click_price;

                var post_price = t.parentNode.parentNode.parentNode.nextElementSibling.querySelector("input.price-value").getAttribute("value").split("€")[0];
                var post_quantity = t.innerHTML;

                updateCart(post_price, post_quantity, curr_size);
                SumPrice();

            })
        });

        var minus = t.previousElementSibling;
        var plus = t.nextElementSibling;



        function doPrice(e) {
            var calc = "";
            quantity = t.innerHTML;
            price = t.parentNode.parentNode.parentNode.nextElementSibling.querySelector("input.price-value");

            if (e.target.className == "minus") {
                if (quantity <= 1) {

                } else {
                    quantity--;
                    t.innerHTML = quantity;
                    calc = def_price * quantity;
                    price.setAttribute("value", calc + "€");

                    var post_size = t.parentNode.parentNode.parentNode.previousElementSibling.querySelector("input:checked").getAttribute("value");

                    console.log(calc);

                    updateCart(calc, quantity, post_size);
                    SumPrice();
                }
            }
            if (e.target.className == "plus") {
                quantity++;
                t.innerHTML = quantity;
                calc = def_price * quantity;
                price.setAttribute("value", calc + "€");
                var post_size = t.parentNode.parentNode.parentNode.previousElementSibling.querySelector("input:checked").getAttribute("value");


                updateCart(calc, quantity, post_size);
                SumPrice();
            }

        }

        minus.addEventListener("click", doPrice);
        plus.addEventListener("click", doPrice);


       /* if (t.parentNode.parentNode.parentNode.parentNode.querySelector("input[name='min-passed']")) {
            var created_at = t.parentNode.parentNode.parentNode.parentNode.querySelector("input[name='created_at']").getAttribute("value");

            var min_passed = t.parentNode.parentNode.parentNode.parentNode.querySelector("input[name='min-passed']").getAttribute("value");
            var date = new Date();
            var months = ["01", "02", "03", "04", "05", "06", "07",
                "08", "09", "10", "11", "12"];

            var seconds = date.getSeconds();

            var minutes = date.getMinutes();


            if (seconds < 10) {
                seconds = "0" + seconds;

            }
            if (minutes < 10) {
                minutes = "0" + minutes;
            }

            var date_fin = date.getFullYear() + "-" + months[date.getMonth()] + "-" + date.getUTCDate() + " " + date.getHours() + ":" + minutes + ":" + seconds;

            console.log(date_fin);
            console.log(min_passed);

            if (date_fin >= min_passed) {
                console.log("20min passed remove Item: " + item_id);
                jQuery.post("update_cart", {
                    timer_remove: 'isset',
                    cart_item_id: item_id
                });
            }
        }*/

    });

    SumPrice();

    var to_cart_btns = document.querySelectorAll("button[name='do-wish']");

    to_cart_btns.forEach(function (value) {
        value.addEventListener("click", function (e) {
            e.target.parentNode.previousElementSibling.previousElementSibling.querySelector("input[name='quantity']").setAttribute("value", e.target.parentNode.previousElementSibling.previousElementSibling.querySelector("span.number").innerHTML);

        })
    })


    if (document.querySelector(".update-success")) {
        setTimeout(function () {
            document.querySelector(".update-success").classList.add("In");
        }, 500);
        setTimeout(function () {
            document.querySelector(".update-success").classList.remove("In");
        }, 5000);
    }


})