document.addEventListener("DOMContentLoaded", function () {

    if(document.querySelector("input#sum-price")) {
        console.log("FIN");

        function SumPrice() {
            var sub_total = document.querySelector(".cart-sum input#sub-total").getAttribute("value").split("€")[0];

            var shipping_price = document.querySelector(".cart-sum input#shipping-price").getAttribute("value").split("+")[1].split("€")[0];

            console.log(shipping_price);

            var calc = parseInt(sub_total) + parseInt(shipping_price);

            document.querySelector("input#sum-price").setAttribute("value", calc + "€");
        }

        var shipping_opt = document.querySelectorAll(".checkout__shipping label");

        shipping_opt.forEach(function (value) {
            value.addEventListener("click", function (e) {
                if (e.target.getAttribute("for").indexOf("standard") !== -1) {

                    document.querySelector(".cart-sum input#shipping-price").setAttribute("value", "+10€")
                } else {
                    document.querySelector(".cart-sum input#shipping-price").setAttribute("value", "+25€")
                }

                SumPrice();
            })
        })


        SumPrice();
    }
})