document.addEventListener("DOMContentLoaded", function () {


    var homeimg_L = document.querySelector(".heroimg-left");
    var homeimg_M = document.querySelector(".heroimg-middle");
    var homeimg_R = document.querySelector(".heroimg-right");

    var main = document.querySelector(".main");
    var main_cnt = document.querySelector(".main__content");
    var all_categ = document.querySelectorAll(".categ");

    window.addEventListener("scroll", function () {
        if (window.pageYOffset <= main.offsetTop) {
            var calc_L = -50 - window.pageYOffset / 10;
            homeimg_L.style.transform = "translateY(" + calc_L + "%)";

            var calc_M = -50 - window.pageYOffset / 12;
            homeimg_M.style.transform = "translateY(" + calc_M + "%)";

            var calc_R = -50 + window.pageYOffset / 10;
            homeimg_R.style.transform = "translateY(" + calc_R + "%)";
        }
        var line_calc = (main.offsetTop - (window.pageYOffset) - 200) * -1;

        /*if (window.pageYOffset >= main.offsetTop - 200) {
            document.querySelector(".content-line").style.height = line_calc * 1.5 + "px";
        } else {
            document.querySelector(".content-line").style.height = 0;
        }*/


        //console.log(window.pageYOffset + "window");


    });
    /* all_categ.forEach(function (t) {

         var calc = (main.offsetTop - (line_calc * 1.5 - 180)) + t.offsetTop;

         if (window.pageYOffset >= calc) {
             t.style.visibility = "visible";
             t.style.opacity = "1";
         } else {
             t.style.visibility = "hidden";
             t.style.opacity = "0";
         }

         /!* var waypoint = new Waypoint({
              element: t,
              handler: function (direction) {


              }
          });*!/
     });*/

    document.querySelector(".hero__scroll .arrow-link").addEventListener("click", function (e) {
        e.preventDefault();

        main.scrollIntoView({block: "start", behavior: "smooth"});

    });


});