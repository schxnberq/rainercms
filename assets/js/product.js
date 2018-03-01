document.addEventListener("DOMContentLoaded", function () {


    var quantity_input = document.querySelector("span.number");
    var minus = document.querySelector("span.minus");
    var plus = document.querySelector("span.plus");

    var value = quantity_input.innerHTML;


    var sizes = document.querySelectorAll(".sizes label.def-label");


    var def_price = document.querySelector("#price").getAttribute("value");


    quantity_input.addEventListener("blur", function (e) {
        value = e.target.innerHTML;
        document.querySelector("#quantity").setAttribute("value", value);
        document.querySelector("#price").setAttribute("value", def_price * value);
    });

    function doSize() {
        var def_sizelabels = document.querySelectorAll(".sizes label.def-label");
        var def_size = def_sizelabels[0].getAttribute("for").split("-")[1];

        var size_price = [];

        var def = def_size + "-" + def_price;
        size_price.push(def);

        var prices = {
            s: {add: 0},
            m: {add: 10},
            l: {add: 25}
        };


        for (var i = 0; i < def_sizelabels.length; i++) {

            if (i == 0) continue;
            /*console.log(def_sizelabels[i].getAttribute("for").split("-")[1]);
            console.log(prices[def_sizelabels[i].getAttribute("for").split("-")[1]]['add']);*/

            var add = def_sizelabels[i].getAttribute("for").split("-")[1] + "-" + (parseInt(def_price) + prices[def_sizelabels[i].getAttribute("for").split("-")[1]]['add'] - prices[def_sizelabels[0].getAttribute("for").split("-")[1]]['add']);


            size_price.push(add);
        }


        def_sizelabels.forEach(function (t) {
            t.addEventListener("click", function (e) {
                var curr_size = e.target.getAttribute("for").split("-")[1];

                for (var i = 0; i < size_price.length; i++) {
                    if (size_price[i].indexOf(curr_size) !== -1) {
                        console.log(size_price[i]);
                        var click_size = size_price[i].split("-")[1];
                        document.querySelector("#price").setAttribute("value", click_size * value);
                        def_price = click_size;
                    }
                }
            })
        })
    }

    doSize();

    function quantity(e) {

        if (e.target.className == "minus") {
            if (value <= 1) {

            } else {
                value--;
                console.log(def_price);
                quantity_input.innerHTML = value;
                document.querySelector("#price").setAttribute("value", def_price * value);
            }
        }
        if (e.target.className == "plus") {
            value++;
            quantity_input.innerHTML = value;
            document.querySelector("#price").setAttribute("value", def_price * value);
        }
    }

    minus.addEventListener("click", quantity);
    plus.addEventListener("click", quantity);


    document.querySelector("button#add-to-cart").addEventListener("click", function (e) {
        document.querySelector("input#quantity").setAttribute("value", quantity_input.innerHTML);
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