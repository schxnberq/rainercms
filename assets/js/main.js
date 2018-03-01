document.addEventListener("DOMContentLoaded", function () {

    document.querySelector(".nav__user__item .acc-drp").addEventListener("click", function (e) {
        e.preventDefault();
        e.target.nextElementSibling.nextElementSibling.classList.toggle("click");
        e.target.nextElementSibling.classList.toggle("click");
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