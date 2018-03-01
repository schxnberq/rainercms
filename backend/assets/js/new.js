window.onload = function () {

    var fileUpload = document.querySelector("input[name='product_img']");

    /*function onSelect(e) {
        if (e.files.length > 3) {
            alert("Please select max 3 files.");
            e.preventDefault();
        }
    }*/

    var dvPreview = document.querySelector(".products__new__imgprev");
    var preview_img = document.querySelector(".products__new__imgprev img");
    var txt = document.createElement("p");
    txt.innerHTML = "Your Product image:";
    if (preview_img) {
        dvPreview.prepend(txt);
    }

    var replace = 0;


    function readURL(input) {
        replace++;
        console.log(replace);
        if (input.target.files && input.target.files[0]) {
            var reader = new FileReader();


            reader.onload = function (e) {
                document.querySelector("label[for='product_img']").classList.add("hovered");
                if (preview_img || replace !== 1 || replace == 2 && replace % 2 !== 0) {
                    document.querySelector(".products__new__imgprev img").setAttribute("src", e.target.result);
                    document.querySelector(".products__new__imgprev img").setAttribute("class", "updated");
                    if (document.querySelector("input#imgupdate")) {
                        document.querySelector("input#imgupdate").setAttribute("value", "update");
                    }

                } else {
                    var img = document.createElement("img");
                    img.setAttribute("src", e.target.result);
                    dvPreview.appendChild(img);
                    dvPreview.prepend(txt);

                }

            };


            reader.readAsDataURL(input.target.files[0]);
        }
    }

    if (preview_img) {
        if (!preview_img.getAttribute("class")) {
            var src = preview_img.getAttribute("src").split("products/");
            document.querySelector("input#imgupdate").setAttribute("value", src[1]);
        }
    }
    fileUpload.addEventListener("change", readURL);


    document.getElementById('bold').addEventListener('click', function (event) {
        event.preventDefault();
        document.execCommand("bold");
    });
    document.getElementById('italic').addEventListener('click', function (event) {
        event.preventDefault();
        document.execCommand("italic");
    });
    document.getElementById('underline').addEventListener('click', function (event) {
        event.preventDefault();
        document.execCommand("underline");
    });


    function handlePaste(e) {
        var clipboardData, pastedData;

        // Stop data actually being pasted into div
        e.stopPropagation();
        e.preventDefault();

        // Get pasted data via clipboard API
        clipboardData = e.clipboardData || window.clipboardData;
        pastedData = clipboardData.getData('Text');

        // Do whatever with pasteddata
        var currHTML = e.target.innerHTML;
        e.target.innerHTML = currHTML + pastedData;

    }

    document.querySelector("#description").addEventListener("paste", handlePaste);
    document.querySelector(".form__submit button").addEventListener("click", function (e) {
        document.querySelector("input#post-description").setAttribute("value", document.querySelector("#description").innerHTML);
    })


    if (document.querySelector(".update-success")) {
        setTimeout(function () {
            document.querySelector(".update-success").classList.add("In");
        }, 500);
        setTimeout(function () {
            document.querySelector(".update-success").classList.remove("In");
        }, 5000);
    }
    var select = document.querySelectorAll("select");

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


    select.forEach(function (t) {
        t.addEventListener("load", selectFocus);
        t.addEventListener("change", selectFocus);
    })


};