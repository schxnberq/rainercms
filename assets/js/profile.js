window.onload = function () {


    var edit_btn = document.querySelectorAll(".form-cnt .edit");

    var count = 0;
    var click = 0;

    edit_btn.forEach(function (t) {


        t.addEventListener("click", function (e) {
            var input = e.target.parentNode.parentNode.children[0];
            var end = input.getAttribute("value");
            if (input.getAttribute("type") !== "email") {
                input.selectionStart = end.length;
            }
            input.select();
        });
    });

    function selectFocus(e) {

        var selected_opt = e.target.options[e.target.selectedIndex].value;

        if (selected_opt == "choose") {
            e.target.nextElementSibling.style.transform = "scaleX(0)";
            e.target.nextElementSibling.style.opacity = "0";
        } else {
            e.target.nextElementSibling.style.transform = "scaleX(1)";
            e.target.nextElementSibling.style.opacity = "1";
        }
    }

    var select = document.querySelectorAll("select");
    select.forEach(function (t) {
        t.addEventListener("load", selectFocus);
        t.addEventListener("change", selectFocus);
    })


};