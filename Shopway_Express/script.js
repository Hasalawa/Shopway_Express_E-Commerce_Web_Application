function change() {
    var signUpBox = document.getElementById("signUpBox");
    var signInBox = document.getElementById("signInBox");

    signUpBox.classList.toggle("d-none");
    signInBox.classList.toggle("d-none");
}

var typed = new Typed('.auto-type', {
    strings: ['Our E-commerce Platform', 'Create Value, Capture Hearts', 'Elevate Your Online Presence'],
    typeSpeed: 150,
    backSpeed: 150,
    loop: true
});

function signUp() {

    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var email = document.getElementById("email").value;
    var pwd = document.getElementById("password").value;
    var pwd1 = document.getElementById("password-1").value;
    var mobile = document.getElementById("mobile").value;
    var gender = document.getElementById("gender").value;

    var f = new FormData();
    f.append("fname", fname);
    f.append("lname", lname);
    f.append("email", email);
    f.append("pwd", pwd);
    f.append("pwd1", pwd1);
    f.append("mobile", mobile);
    f.append("gender", gender);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;

            if (t == "Please Enter Your First Name.") {
                document.getElementById("msg").innerHTML = t;
                document.getElementById("msgdiv").className = "d-block";
                document.getElementById("alertdiv").className = "d-none";
                document.getElementById("alertdiv1").className = "d-none";
                document.getElementById("alertdiv2").className = "d-none";
                document.getElementById("alertdiv3").className = "d-none";
                document.getElementById("alertdiv4").className = "d-none";
                document.getElementById("alertdiv5").className = "d-none";
                document.getElementById("alertdiv6").className = "d-none";
                document.getElementById("msgdiv1").className = "d-none";
            } else if (t == "The Charater Limit Is 20.") {
                document.getElementById("msg").innerHTML = t;
                document.getElementById("msgdiv").className = "d-block";
                document.getElementById("alertdiv").className = "d-none";
                document.getElementById("alertdiv1").className = "d-none";
                document.getElementById("alertdiv2").className = "d-none";
                document.getElementById("alertdiv3").className = "d-none";
                document.getElementById("alertdiv4").className = "d-none";
                document.getElementById("alertdiv5").className = "d-none";
                document.getElementById("alertdiv6").className = "d-none";
                document.getElementById("msgdiv1").className = "d-none";
            } else if (t == "Please Enter Your Last Name.") {
                document.getElementById("alert1").innerHTML = t;
                document.getElementById("alertdiv").className = "d-block";
                document.getElementById("msgdiv").className = "d-none";
                document.getElementById("alertdiv1").className = "d-none";
                document.getElementById("alertdiv2").className = "d-none";
                document.getElementById("alertdiv3").className = "d-none";
                document.getElementById("alertdiv4").className = "d-none";
                document.getElementById("alertdiv5").className = "d-none";
                document.getElementById("alertdiv6").className = "d-none";
                document.getElementById("msgdiv1").className = "d-none";
            } else if (t == "The Charater Limit Is 20") {
                document.getElementById("alert1").innerHTML = t;
                document.getElementById("alertdiv").className = "d-block";
                document.getElementById("msgdiv").className = "d-none";
                document.getElementById("alertdiv1").className = "d-none";
                document.getElementById("alertdiv2").className = "d-none";
                document.getElementById("alertdiv3").className = "d-none";
                document.getElementById("alertdiv4").className = "d-none";
                document.getElementById("alertdiv5").className = "d-none";
                document.getElementById("alertdiv6").className = "d-none";
                document.getElementById("msgdiv1").className = "d-none";
            } else if (t == "Please Enter Your Email Address.") {
                document.getElementById("alert2").innerHTML = t;
                document.getElementById("alertdiv1").className = "d-block";
                document.getElementById("msgdiv").className = "d-none";
                document.getElementById("alertdiv").className = "d-none";
                document.getElementById("alertdiv2").className = "d-none";
                document.getElementById("alertdiv3").className = "d-none";
                document.getElementById("alertdiv4").className = "d-none";
                document.getElementById("alertdiv5").className = "d-none";
                document.getElementById("alertdiv6").className = "d-none";
                document.getElementById("msgdiv1").className = "d-none";
            } else if (t == "Email Must Have Less Than 100 Characters.") {
                document.getElementById("alert2").innerHTML = t;
                document.getElementById("alertdiv1").className = "d-block";
                document.getElementById("msgdiv").className = "d-none";
                document.getElementById("alertdiv").className = "d-none";
                document.getElementById("alertdiv2").className = "d-none";
                document.getElementById("alertdiv3").className = "d-none";
                document.getElementById("alertdiv4").className = "d-none";
                document.getElementById("alertdiv5").className = "d-none";
                document.getElementById("alertdiv6").className = "d-none";
                document.getElementById("msgdiv1").className = "d-none";
            } else if (t == "Invalid Email Address.") {
                document.getElementById("alert2").innerHTML = t;
                document.getElementById("alertdiv1").className = "d-block";
                document.getElementById("msgdiv").className = "d-none";
                document.getElementById("alertdiv").className = "d-none";
                document.getElementById("alertdiv2").className = "d-none";
                document.getElementById("alertdiv3").className = "d-none";
                document.getElementById("alertdiv4").className = "d-none";
                document.getElementById("alertdiv5").className = "d-none";
                document.getElementById("alertdiv6").className = "d-none";
                document.getElementById("msgdiv1").className = "d-none";
            } else if (t == "Please Enter Your Password.") {
                document.getElementById("alert3").innerHTML = t;
                document.getElementById("alertdiv2").className = "d-block";
                document.getElementById("alertdiv").className = "d-none";
                document.getElementById("msgdiv").className = "d-none";
                document.getElementById("alertdiv3").className = "d-none";
                document.getElementById("alertdiv4").className = "d-none";
                document.getElementById("alertdiv5").className = "d-none";
                document.getElementById("alertdiv6").className = "d-none";
                document.getElementById("alertdiv1").className = "d-none";
                document.getElementById("msgdiv1").className = "d-none";
            } else if (t == "Password Length is 5 - 15.") {
                document.getElementById("alert3").innerHTML = t;
                document.getElementById("alertdiv2").className = "d-block";
                document.getElementById("alertdiv").className = "d-none";
                document.getElementById("msgdiv").className = "d-none";
                document.getElementById("alertdiv3").className = "d-none";
                document.getElementById("alertdiv4").className = "d-none";
                document.getElementById("alertdiv5").className = "d-none";
                document.getElementById("alertdiv6").className = "d-none";
                document.getElementById("alertdiv1").className = "d-none";
                document.getElementById("msgdiv1").className = "d-none";
            } else if (t == "Please Enter Your Password") {
                document.getElementById("alert4").innerHTML = t;
                document.getElementById("alertdiv3").className = "d-block";
                document.getElementById("alertdiv").className = "d-none";
                document.getElementById("msgdiv").className = "d-none";
                document.getElementById("alertdiv4").className = "d-none";
                document.getElementById("alertdiv5").className = "d-none";
                document.getElementById("alertdiv6").className = "d-none";
                document.getElementById("alertdiv1").className = "d-none";
                document.getElementById("msgdiv1").className = "d-none";
                document.getElementById("alertdiv2").className = "d-none";
            } else if (t == "Pasword Does Not Match") {
                document.getElementById("alert5").innerHTML = t;
                document.getElementById("alertdiv4").className = "d-block";
                document.getElementById("alertdiv").className = "d-none";
                document.getElementById("msgdiv").className = "d-none";
                document.getElementById("alertdiv5").className = "d-none";
                document.getElementById("alertdiv6").className = "d-none";
                document.getElementById("alertdiv1").className = "d-none";
                document.getElementById("msgdiv1").className = "d-none";
                document.getElementById("alertdiv2").className = "d-none";
                document.getElementById("alertdiv3").className = "d-none";
            } else if (t == "Please Enter Your Mobile Number.") {
                document.getElementById("alert6").innerHTML = t;
                document.getElementById("alertdiv5").className = "d-block";
                document.getElementById("alertdiv").className = "d-none";
                document.getElementById("msgdiv").className = "d-none";
                document.getElementById("alertdiv6").className = "d-none";
                document.getElementById("alertdiv1").className = "d-none";
                document.getElementById("msgdiv1").className = "d-none";
                document.getElementById("alertdiv2").className = "d-none";
                document.getElementById("alertdiv3").className = "d-none";
                document.getElementById("alertdiv4").className = "d-none";
            } else if (t == "The Character Limit Is 10.") {
                document.getElementById("alert6").innerHTML = t;
                document.getElementById("alertdiv5").className = "d-block";
                document.getElementById("alertdiv").className = "d-none";
                document.getElementById("msgdiv").className = "d-none";
                document.getElementById("alertdiv6").className = "d-none";
                document.getElementById("alertdiv1").className = "d-none";
                document.getElementById("msgdiv1").className = "d-none";
                document.getElementById("alertdiv2").className = "d-none";
                document.getElementById("alertdiv3").className = "d-none";
                document.getElementById("alertdiv4").className = "d-none";
            } else if (t == "Invalid Mobile Number.") {
                document.getElementById("alert6").innerHTML = t;
                document.getElementById("alertdiv5").className = "d-block";
                document.getElementById("alertdiv").className = "d-none";
                document.getElementById("msgdiv").className = "d-none";
                document.getElementById("alertdiv6").className = "d-none";
                document.getElementById("alertdiv1").className = "d-none";
                document.getElementById("msgdiv1").className = "d-none";
                document.getElementById("alertdiv2").className = "d-none";
                document.getElementById("alertdiv3").className = "d-none";
                document.getElementById("alertdiv4").className = "d-none";
            } else if (t == "Please Select Your Gender.") {
                document.getElementById("alert7").innerHTML = t;
                document.getElementById("alertdiv6").className = "d-block";
                document.getElementById("alertdiv").className = "d-none";
                document.getElementById("msgdiv").className = "d-none";
                document.getElementById("alertdiv1").className = "d-none";
                document.getElementById("msgdiv1").className = "d-none";
                document.getElementById("alertdiv2").className = "d-none";
                document.getElementById("alertdiv3").className = "d-none";
                document.getElementById("alertdiv4").className = "d-none";
                document.getElementById("alertdiv5").className = "d-none";
            } else if (t == "success") {
                document.getElementById("msg1").innerHTML = "Registerd Successfully, Signin Now!";
                document.getElementById("msgdiv1").className = "d-block";
                document.getElementById("fname").value = "";
                document.getElementById("lname").value = "";
                document.getElementById("email").value = "";
                document.getElementById("password").value = "";
                document.getElementById("password-1").value = "";
                document.getElementById("mobile").value = "";
                document.getElementById("gender").value = 0;
            } else if (t == "Email Or Mobile Number Already Exists.") {
                document.getElementById("msg1").innerHTML = t;
                document.getElementById("msgdiv1").className = "d-block";
                document.getElementById("alertdiv").className = "d-none";
                document.getElementById("msgdiv").className = "d-none";
                document.getElementById("alertdiv1").className = "d-none";
                document.getElementById("alertdiv2").className = "d-none";
                document.getElementById("alertdiv3").className = "d-none";
                document.getElementById("alertdiv4").className = "d-none";
                document.getElementById("alertdiv5").className = "d-none";
                document.getElementById("alertdiv6").className = "d-none";
            }

        }
    }

    r.open("POST", "signUpProcess.php", true);
    r.send(f);

}

function signIn() {

    var email = document.getElementById("email1").value;
    var password = document.getElementById("pwd").value;
    var rM = document.getElementById("rememberMe").checked;

    var f = new FormData();
    f.append('email', email);
    f.append('password', password);
    f.append("rM", rM);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;

            if (t == "Please Enter Your Email.") {
                document.getElementById("msg2").innerHTML = t;
                document.getElementById("msgdiv2").className = "d-block";
                document.getElementById("msgdiv3").className = "d-none";
                document.getElementById("msgdiv4").className = "d-none";
            } else if (t == "Invalid Email Address.") {
                document.getElementById("msg2").innerHTML = t;
                document.getElementById("msgdiv2").className = "d-block";
                document.getElementById("msgdiv3").className = "d-none";
                document.getElementById("msgdiv4").className = "d-none";
            } else if (t == "Please Enter Your Password.") {
                document.getElementById("msg3").innerHTML = t;
                document.getElementById("msgdiv3").className = "d-block";
                document.getElementById("msgdiv2").className = "d-none";
                document.getElementById("msgdiv4").className = "d-none";
            } else if (t == "success") {
                window.location = "home.php";
            } else if (t == "Invalid Username or Password.") {
                document.getElementById("msg4").innerHTML = t;
                document.getElementById("msgdiv4").className = "d-block";
                document.getElementById("msgdiv2").className = "d-none";
                document.getElementById("msgdiv3").className = "d-none";
            }

        }
    }

    r.open("POST", "signInProcess.php", true);
    r.send(f);

}

function signOut() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                window.location.reload();
            }

        }
    }

    r.open("GET", "signOutProcess.php", true);
    r.send();

}

function forgotPassword() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("signInBox").innerHTML = t;
        }
    }

    r.open("GET", "forgotPassword.php", true);
    r.send();

}

function verifyCodeSend() {

    var e = document.getElementById("e").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            if (t == "Verification Code Sending Failed") {
                document.getElementById("message").innerHTML = t;
                document.getElementById("msgbox1").className = "d-block";
            } else if (t == "Invalid Email Address.") {
                document.getElementById("message").innerHTML = t;
                document.getElementById("msgbox1").className = "d-block";
            } else {
                document.getElementById("signInBox").innerHTML = t;
                document.getElementById("message1").innerHTML = "Verification Code Has Sent Check Your Email";
                document.getElementById("msgbox2").className = "d-block";
            }
        }
    }

    r.open("GET", "forgotPasswordProcess.php?e=" + e, true);
    r.send();

}

function resetpwd() {

    var nP = document.getElementById("newP").value;
    var rP = document.getElementById("rP").value;
    var vCode = document.getElementById("vCode").value;

    var f = new FormData();
    f.append("nP", nP);
    f.append("rP", rP);
    f.append("vCode", vCode);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.status === 200 && r.readyState === 4) {
            var t = r.responseText;

            if (t == "success") {
                alert("Password Changed Successfull");
                window.location = "index.php";
            } else {
                document.getElementById("message1").innerHTML = t;
                document.getElementById("msgbox2").className = "d-block";
            }

        }
    }

    r.open("POST", "resetPassword.php", true);
    r.send(f);

}

function showPassword() {

    var np = document.getElementById("newP");
    var npb = document.getElementById("npb");

    if (np.type == "password") {

        np.type = "text";
        npb.innerHTML = '<i class="bi bi-eye-fill"></i>';

    } else {

        np.type = "password";
        npb.innerHTML = '<i class="bi bi-eye-slash-fill"></i>';

    }

}

function showPassword1() {

    var rnp = document.getElementById("rP");
    var rnpb = document.getElementById("rnpb");

    if (rnp.type == "password") {

        rnp.type = "text";
        rnpb.innerHTML = '<i class="bi bi-eye-fill"></i>';

    } else {

        rnp.type = "password";
        rnpb.innerHTML = '<i class="bi bi-eye-slash-fill"></i>';

    }

}

function cancel() {

    window.location.reload();

}

function changeImage() {

    var image = document.getElementById("profileImg");
    image.onchange = function () {

        var file = this.files[0];
        var url = window.URL.createObjectURL(file);
        document.getElementById("img").src = url;

    }

}

function updateProfile() {

    var profileImg = document.getElementById("profileImg").files[0];
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var mobile = document.getElementById("mobile").value;
    var line1 = document.getElementById("line1").value;
    var line2 = document.getElementById("line2").value;
    var line3 = document.getElementById("line3").value;
    var city = document.getElementById("city").value;
    var district = document.getElementById("district").value;
    var province = document.getElementById("province").value;
    var pCode = document.getElementById("postalCode").value;

    var f = new FormData();
    f.append("pImg", profileImg);
    f.append("fname", fname);
    f.append("lname", lname);
    f.append("mobile", mobile);
    f.append("line1", line1);
    f.append("line2", line2);
    f.append("line3", line3);
    f.append("city", city);
    f.append("district", district);
    f.append("province", province);
    f.append("pCode", pCode);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;

            if (t == "success") {
                window.location.reload();
            } else {
                alert(t);
            }

        }
    }

    r.open("POST", "updateProfileProcess.php", true);
    r.send(f);

}

function changeProductImage() {

    var images = document.getElementById("imageuploader");

    images.onchange = function () {

        var file_count = images.files.length;

        if (file_count <= 3) {

            for (var x = 0; x < file_count; x++) {
                var file = this.files[x];
                var url = window.URL.createObjectURL(file);
                document.getElementById("i" + x).src = url;
            }

        } else {
            alert(file_count + "files uploaded. You are proceed to upload 3 or less than 3 files.");
        }

    }

}

function loadBrands() {

    var category = document.getElementById("category").value;

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            document.getElementById("brand").innerHTML = t;
        }
    }

    r.open("GET", "loadBrandsProcess.php?c=" + category, true);
    r.send();

}

function loadModel() {

    var brand = document.getElementById("brand").value;

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            document.getElementById("model").innerHTML = t;
        }
    }

    r.open("GET", "loadModel.php?b=" + brand, true);
    r.send();

}

function addProduct() {

    var title = document.getElementById("title").value;
    var category = document.getElementById("category").value;
    var brand = document.getElementById("brand").value;
    var model = document.getElementById("model").value;
    var colour = document.getElementById("colour").value;
    var condition = 0;
    if (document.getElementById("brandNew").checked) {
        condition = 1;
    } else if (document.getElementById("used").checked) {
        condition = 2;
    }
    var qty = document.getElementById("qty").value;
    var cost = document.getElementById("cost").value;
    var deliveryCWM = document.getElementById("deliveryCWM").value;
    var diliveryCOM = document.getElementById("diliveryCOM").value;
    var description = document.getElementById("description").value;
    var image = document.getElementById("imageuploader");

    var f = new FormData();
    f.append("title", title);
    f.append("category", category);
    f.append("brand", brand);
    f.append("model", model);
    f.append("colour", colour);
    f.append("condition", condition);
    f.append("qty", qty);
    f.append("cost", cost);
    f.append("deliveryCWM", deliveryCWM);
    f.append("diliveryCOM", diliveryCOM);
    f.append("description", description);

    var file_count = image.files.length;
    for (var x = 0; x < file_count; x++) {
        f.append("image" + x, image.files[x]);
    }

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "success") {
                succ();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "addProductProcess.php", true);
    r.send(f);

}

function succ() {

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            document.getElementById("successfulImageLoader").innerHTML = t;
            document.getElementById("head").className = "d-none";
            document.getElementById("foot").className = "d-none";
        }
    }

    r.open("GET", "successfulImageLoader.php", true);
    r.send();

}

function Ok() {
    window.location.reload();
}

function basicSearch(x) {

    var select = document.getElementById("basic_search_select").value;
    var text = document.getElementById("basic_search_txt").value;

    var f = new FormData();
    f.append("select", select);
    f.append("text", text);
    f.append("page", x);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            document.getElementById("basicSearchResult").innerHTML = t;
        }
    }

    r.open("POST", "basicSearchProcess.php", true);
    r.send(f);

}

function changeStatus(id) {

    var product_id = id;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            if (t == "activated" || t == "deactivated") {
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "changeStatusProcess.php?p=" + product_id, true);
    r.send();

}

function updateSendId(product_id) {

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "updateProduct.php";
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "sendIdProcess.php?product_id=" + product_id, true);
    r.send();

}

function update() {

    var title = document.getElementById("updateTitle").value;
    var qty = document.getElementById("updateQty").value;
    var dCoM = document.getElementById("dCostM").value;
    var dCO = document.getElementById("dOCost").value;
    var descri = document.getElementById("pDescription").value;
    var image = document.getElementById("imageuploader");

    var f = new FormData();
    f.append("title", title);
    f.append("qty", qty);
    f.append("dCom", dCoM);
    f.append("dCO", dCO);
    f.append("descri", descri);

    var file_count = image.files.length;
    for (var x = 0; x < file_count; x++) {
        f.append("image" + x, image.files[x]);
    }

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                alert("Product Updated Successful");
                window.location = "myProduct.php";
            } else {
                alert(t);
            }

        }
    }

    r.open("POST", "updateProductProcess.php", true);
    r.send(f);

}

function sort(x) {

    var search = document.getElementById("s");
    var time = "0";

    if (document.getElementById("n").checked) {
        time = "1";
    } else if (document.getElementById("o").checked) {
        time = "2";
    }

    var qty = "0";

    if (document.getElementById("h").checked) {
        qty = "1";
    } else if (document.getElementById("l").checked) {
        qty = "2";
    }

    var condition = "0";

    if (document.getElementById("b").checked) {
        condition = "1";
    } else if (document.getElementById("u").checked) {
        condition = "2";
    }

    var f = new FormData();
    f.append("s", search.value);
    f.append("t", time);
    f.append("q", qty);
    f.append("c", condition);
    f.append("page", x);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("sort").innerHTML = t;
        }
    }

    r.open("POST", "sortProcess.php", true);
    r.send(f);

}

function advancedSearch(x) {

    var text = document.getElementById("t").value;
    var category = document.getElementById("c1").value;
    var brand = document.getElementById("b1").value;
    var model = document.getElementById("m").value;
    var condition = document.getElementById("c2").value;
    var color = document.getElementById("c3").value;
    var priceFrom = document.getElementById("pf").value;
    var priceTo = document.getElementById("pt").value;
    var sort = document.getElementById("sort").value;

    var f = new FormData();
    f.append("t", text);
    f.append("c1", category);
    f.append("b1", brand);
    f.append("m", model);
    f.append("c2", condition);
    f.append("c3", color);
    f.append("pf", priceFrom);
    f.append("pt", priceTo);
    f.append("sort", sort);
    f.append("page", x);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("advancedSearchResult").innerHTML = t;
        }
    }

    r.open("POST", "advancedSearchProcess.php", true);
    r.send(f);

}

function addToCart(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            if (t == "This Product Already Exists In The Cart") {
                alert("This Product Already Exists In The Cart");
            } else if (t == "Product Added") {
                alert("Product Added");
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "addToCartProcess.php?id=" + id, true);
    r.send();

}

function removeFromCart(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            if (t == "deleted") {
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "removeFromCarttProcess.php?id=" + id, true);
    r.send();

}

function addToWatchlist(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "Removed") {
                document.getElementById("heart" + id).className = "text-dark";
                window.location.reload();
            } else if (t == "Added") {
                document.getElementById("heart" + id).className = "text-danger";
                window.location.reload();
            } else {
                alert(t);
            }

        }

    }

    r.open("GET", "addToWatchlistProcess.php?id=" + id, true);
    r.send();

}

function removeFromeWatchlist(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            if (t == "Deleted") {
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "removeFromWatchListProcess.php?id=" + id, true);
    r.send();

}

function changeMainImg(id) {

    var new_img = document.getElementById("product_img" + id).src;
    var main_img = document.getElementById("mainImg");

    main_img.style.backgroundImage = "url(" + new_img + ")";

}

function check_value(qty) {

    var input = document.getElementById("qty_input");

    if (input.value < 1) {
        alert("You must add 1 or more");
        input.value = 1;
    } else if (input.value > qty) {
        alert("Insufficieant quantity");
        input.value = qty;
    }

}

function paynow(pid) {

    var qty = document.getElementById("qty_input").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            var obj = JSON.parse(t);

            var umail = obj["umail"];
            var amount = obj["amount"];

            if (t == 1) {
                alert("Please login.");
                window.location = "index.php";
            } else if (t == 2) {
                alert("Please Update your profile");
                window.location = "userProfile.php";
            } else {

                // Payment completed. It can be a successful failure.
                payhere.onCompleted = function onCompleted(orderId) {
                    console.log("Payment completed. OrderID:" + orderId);

                    saveInvoice(orderId, pid, umail, amount, qty);
                    // Note: validate the payment and show success or failure page to the customer
                };

                // Payment window closed
                payhere.onDismissed = function onDismissed() {
                    // Note: Prompt user to pay again or show an error page
                    console.log("Payment dismissed");
                };

                // Error occurred
                payhere.onError = function onError(error) {
                    // Note: show an error page
                    console.log("Error:" + error);
                };

                // Put the payment variables here
                var payment = {
                    "sandbox": true,
                    "merchant_id": "1222356",    // Replace your Merchant ID
                    "return_url": "http://localhost/eshop/singleProductView.php?id=" + pid,     // Important
                    "cancel_url": "http://localhost/eshop/singleProductView.php?id=" + pid,     // Important
                    "notify_url": "http://sample.com/notify",
                    "order_id": obj["id"],
                    "items": obj["item"],
                    "amount": amount,
                    "currency": "LKR",
                    "hash": obj["hash"], // *Replace with generated hash retrieved from backend
                    "first_name": obj["fname"],
                    "last_name": obj["lname"],
                    "email": umail,
                    "phone": obj["mobile"],
                    "address": obj["address"],
                    "city": obj["city"],
                    "country": "Sri Lanka",
                    "delivery_address": obj["address"],
                    "delivery_city": obj["city"],
                    "delivery_country": "Sri Lanka",
                    "custom_1": "",
                    "custom_2": ""
                };

                // Show the payhere.js popup, when "PayHere Pay" is clicked
                // document.getElementById('payhere-payment').onclick = function (e) {
                payhere.startPayment(payment);
                // };

            }
        }
    }

    r.open("GET", "payNowProcess.php?id=" + pid + "&qty=" + qty, true);
    r.send();

}

function saveInvoice(orderId, pid, umail, amount, qty) {

    var form = new FormData();
    form.append("o", orderId);
    form.append("i", pid);
    form.append("m", umail);
    form.append("a", amount);
    form.append("q", qty);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 & request.readyState == 4) {
            var response = request.responseText;

            if (response == "success") {
                window.location = "invoice.php?id=" + orderId;
            } else {
                alert(response);
            }
        }
    }

    request.open("POST", "saveInvoiceProcess.php", true);
    request.send(form);

}

function printInvoice() {
    var restorePage = document.body.innerHTML;
    var page = document.getElementById("page").innerHTML;
    document.body.innerHTML = page;
    window.print();
    document.body.innerHTML = restorePage;
}

function deleHistory(delId) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            if (t == "deleted") {
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "deleteHistoryProcess.php?delId=" + delId, true);
    r.send();

}

function removeAll() {

    var del = document.getElementById("del").checked;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            if (t == "deleted") {
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "deleteAllHistoryProcess.php?del=" + del, true);
    r.send();

}

function searchInvoice() {
    var txt = document.getElementById("searchtxt").value;

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 & request.readyState == 4) {
            var response = request.responseText;
            if (response == "Invalid Invoice ID.") {
                alert(response);
            } else {
                document.getElementById("viewArea").innerHTML = response;
            }
        }
    }

    request.open("GET", "searchInvoiceProcess.php?id=" + txt, true);
    request.send();
}

function findsellings() {

    var from = document.getElementById("from").value;
    var to = document.getElementById("to").value;

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 & request.readyState == 4) {
            var response = request.responseText;
            document.getElementById("viewArea").innerHTML = response;
        }
    }

    request.open("GET", "findSellingsProcess.php?f=" + from + "&t=" + to, true);
    request.send();

}

function changeInvoiceStatus(id) {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 & request.readyState == 4) {
            var response = request.responseText;
            if (response == "success") {
                window.location.reload();
            } else {
                alert(response);
            }
        }
    }

    request.open("GET", "changeInvoiceStatusProcess.php?id=" + id, true);
    request.send();

}

function incrementCartQty(x) {

    var cartId = x;
    var qty = document.getElementById("qty" + x);
    var newQty = parseInt(qty.value) + 1;

    //alert(newQty);

    var f = new FormData();
    f.append("c", cartId);
    f.append("q", newQty);


    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            //alert(response);
            if (response == "success") {
                qty.value = parseInt(qty.value) + 1;
                window.location.reload();
            } else {
                alert(response);
            }

        }
    };

    request.open("POST", "updateCartQtyProcess.php", true);
    request.send(f);

}

function decrementCartQty(x) {

    var cartId = x;
    var qty = document.getElementById("qty" + x);
    var newQty = parseInt(qty.value) - 1;

    var f = new FormData();
    f.append("c", cartId);
    f.append("q", newQty);

    if (newQty > 0) {

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var response = request.responseText;
                //alert(response);
                if (response == "success") {
                    qty.value = parseInt(qty.value) - 1;
                    window.location.reload();
                } else {
                    alert(response);
                }

            }
        };

        request.open("POST", "updateCartQtyProcess.php", true);
        request.send(f);

    }

}

function adminLogin() {

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("signUpBox").innerHTML = t;
        }
    }

    r.open("GET", "adminLogin.php", true);
    r.send();

}

var av;

function adminVerification() {
    var email = document.getElementById("e");

    var f = new FormData();
    f.append("e", email.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                var adminVerification = document.getElementById("verificationModal");
                av = new bootstrap.Modal(adminVerification);
                av.show();

            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "adminVerificationProcess.php", true);
    r.send(f);

}
function verify() {

    var Verification = document.getElementById("vcode");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                av.hide();
                window.location = "adminPanel.php";
            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "verificationProcess.php?v=" + Verification.value, true);
    r.send();
}

function userSearch() {

    var txt = document.getElementById("user");

    var f = new FormData();
    f.append("t", txt.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("userSearch").innerHTML = t;
        }
    }

    r.open("POST", "userSearchProcess.php", true);
    r.send(f);

}

function blockUser(email) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "Bolcked") {
                document.getElementById("ub" + email).innerHTML = "UnBlock";
                document.getElementById("ub" + email).classList = "btn btn-success fw-bold";
            } else if (t == "UnBolcked") {
                document.getElementById("ub" + email).innerHTML = "Block";
                document.getElementById("ub" + email).classList = "btn btn-danger fw-bold";
            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "userBlockProcess.php?email=" + email, true);
    r.send();
}

function blockProduct(id) {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var txt = request.responseText;
            if (txt == "blocked") {
                document.getElementById("pb" + id).innerHTML = "Unblock";
                document.getElementById("pb" + id).classList = "btn btn-success fw-bold";
            } else if (txt == "unblocked") {
                document.getElementById("pb" + id).innerHTML = "Block";
                document.getElementById("pb" + id).classList = "btn btn-danger fw-bold";
            } else {
                alert(txt);
            }
        }
    }

    request.open("GET", "productBlockProcess.php?id=" + id, true);
    request.send();

}

function productSearch() {

    var txt = document.getElementById("product");

    var f = new FormData();
    f.append("t", txt.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("productSearch").innerHTML = t;
        }
    }

    r.open("POST", "productSearchProcess.php", true);
    r.send(f);

}

function logOut() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                window.location = "index.php";
            }

        }
    }

    r.open("GET", "logOutProcess.php", true);
    r.send();

}

function checkOut() {
    //alert("ok");

    var f = new FormData();
    f.append("cart", true);


    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            //alert(response);
            var payment = JSON.parse(response);
            doCheckout(payment, "checkoutProces.php");

        }
    };

    request.open("POST", "paymentProcess.php", true);
    request.send(f);
}

function doCheckout(payment, path) {

    // Payment completed. It can be a successful failure.
    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);
        // Note: validate the payment and show success or failure page to the customer

        var f = new FormData();
        f.append("payment", JSON.stringify(payment));

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var response = request.responseText;
                // alert(response);
                if (response == "Success") {
                    alert("Payment Successfull.");
                    window.location = "invoice.php?id=" + payment["order_id"];
                } else {
                    alert(response);
                }
            }
        };

        request.open("POST", path, true);
        request.send(f);

    };

    // Payment window closed
    payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
    };

    // Error occurred
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:" + error);
    };

    // Show the payhere.js popup, when "PayHere Pay" is clicked
    // document.getElementById('payhere-payment').onclick = function (e) {
    payhere.startPayment(payment);
    // };
}

function chartLoad() {
    var ctx = document.getElementById('myChart');

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            // alert(t);
            var data = JSON.parse(t);

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: data.labels,
                        data: data.data,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(54, 162, 235, 0.2)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    }

    r.open("POST", "chartLoadProcess.php", true);
    r.send();
}