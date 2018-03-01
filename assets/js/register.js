window.onload = function () {

    var select = document.querySelector("select#country");

    select.addEventListener("change", function (e) {
        var selected_opt = e.target.options[e.target.selectedIndex].value;
        if (selected_opt == "choose") {
            e.target.nextElementSibling.style.transform = "scaleX(0)";
        } else {

            e.target.nextElementSibling.style.transform = "scaleX(1)";
        }
    })

}