document.addEventListener("DOMContentLoaded", function (doc) {


    var wish_link = document.querySelectorAll(".wishlist");
    var icon_hearts = document.querySelectorAll(".icon-heart2.icon-anim");


    wish_link.forEach(function (t) {
        function random(min, max) {
            return Math.floor(Math.random() * (max - min) + min);
        }

        t.children[2].style.fontSize = random(6, 12) + "px";
        t.children[3].style.fontSize = random(6, 12) + "px";
        t.children[4].style.fontSize = random(6, 12) + "px";
        t.addEventListener("click", function (e) {
            e.preventDefault();

            if (e.target.href.indexOf("login") !== -1) {
                document.querySelector("html").style.overflow = "hidden";
                document.querySelector(".wish-redirect").classList.toggle("open");

                document.querySelector(".wish-redirect .exit").addEventListener("click", function () {
                    document.querySelector("html").style.overflow = "auto";
                    document.querySelector(".wish-redirect").classList.remove("open");
                })

                document.addEventListener("keydown", function (ev) {
                    if (ev.keyCode == 27) {
                        document.querySelector("html").style.overflow = "auto";
                        document.querySelector(".wish-redirect").classList.remove("open");
                    }
                })

            } else {
                var href = t.previousElementSibling.getAttribute("href").split("/");
                var item_id = href[href.length - 1];

                console.log(item_id);

                var anim_icons = t.querySelectorAll(".icon-heart2.icon-anim");

                if (t.classList.contains("is-wished")) {
                    jQuery.post("save_wish", {
                        remove_id: item_id
                    })

                    t.classList.remove("is-wished");

                    t.querySelector(".basic--hover").style.opacity = "0";

                } else {
                    jQuery.post("save_wish", {
                        wish_id: item_id
                    });

                    t.classList.add("added");

                    setTimeout(function () {
                        t.classList.remove("added");
                    }, 2000);

                    for (var i = 0; i < anim_icons.length; i++) {
                        anim_icons[i].style.opacity = "1";
                        anim_icons[i].style.transform = "translate(" + random(20, 35) + "px," + random(-30, -10) + "px)";
                    }
                    setTimeout(function () {
                        for (var i = 0; i < anim_icons.length; i++) {
                            anim_icons[i].style.opacity = "0";
                        }
                    }, 325);
                    t.querySelector(".basic--hover").style.opacity = "1";
                }


            }

        })
    })


});
