function send_message() {
    const name = jQuery("#name").val();
    const email = jQuery("#email").val();
    const mobile = jQuery("#mobile").val();
    const message = jQuery("#message").val();

    if (name == "") {
        showAlert('Please enter name');
    } else if (email == "") {
        showAlert('Please enter email');
    } else if (mobile == "") {
        showAlert('Please enter mobile');
    } else if (message == "") {
        showAlert('Please enter message');
    } else {
        jQuery.ajax({
            url: 'send_message.php',
            type: 'post',
            data: 'name=' + name + '&email=' + email + '&mobile=' + mobile + '&message=' + message,
            success: function(result) {
                showDone(result);
                document.getElementById('contact-form').reset();
            }
        });
    }
}

const showAlert = (msg) => {
    let alertBox = document.querySelector('.alert-box');
    let alertMsg = document.querySelector('.alert-msg');
    alertMsg.innerHTML = msg;
    alertBox.classList.add('show');
    setTimeout(() => {
        alertBox.classList.remove('show');
    }, 3000);
    return false;
}

const showDone = (msg) => {
    let alertBoxDone = document.querySelector('.alert-box-done');
    let alertMesg = document.querySelector('.alert-mesg');
    alertMesg.innerHTML = msg;
    alertBoxDone.classList.add('show');
    setTimeout(() => {
        alertBoxDone.classList.remove('show');
    }, 3000);
    return false;
}

function user_register() {
    const name = jQuery("#name").val();
    const email = jQuery("#email").val();
    const mobile = jQuery("#mobile").val();
    const password = jQuery("#password").val();
    const confirm_password = jQuery("#confirm_password").val();
    var lowerCaseLetters = /[a-z]/g;
    var upperCaseLetters = /[A-Z]/g;
    var numbers = /[0-9]/g;

    if (name == "") {
        showAlert('Please enter name');
    } else if (email == "") {
        showAlert('Please enter email');
    } else if (mobile == "") {
        showAlert('Please enter mobile');
    } else if (password.length < 8) {
        showAlert('Password must be at least 8 letters long');
    } else if (!password.match(lowerCaseLetters)) {
        showAlert('Password must contain a lowercase letter');
    } else if (!password.match(upperCaseLetters)) {
        showAlert('Password must contain an uppercase letter');
    } else if (!password.match(numbers)) {
        showAlert('Password must contain a number');
    } else if (confirm_password == "") {
        showAlert('Please confirm your password');
    } else if (password != '' && confirm_password != '' && password != confirm_password) {
        showAlert('Please enter same password');
    } else {
        jQuery.ajax({
            url: 'register_submit.php',
            type: 'post',
            data: 'name=' + name + '&email=' + email + '&mobile=' + mobile + '&password=' + password,
            success: function(result) {
                if (result == "Email Already Exists") {
                    showAlert(result);
                }
                if (result == "Mobile number Already Exists") {
                    showAlert(result);
                }
                if (result == "Account Created Succesfully!") {
                    showDone(result);
                    document.getElementById('register-form').reset();
                    setTimeout(function() {
                        window.location.href = 'login.php';
                    }, 5000);
                }
            }
        });
    }
}

function user_login() {
    const email = jQuery("#login_email").val();
    const password = jQuery("#login_password").val();

    if (email == "") {
        showAlert('Please enter email');
    } else if (password == "") {
        showAlert('Please enter your password');
    } else {
        jQuery.ajax({
            url: 'login_submit.php',
            type: 'post',
            data: 'email=' + email + '&password=' + password,
            success: function(result) {
                if (result == "Incorrect Login Details") {
                    showAlert(result);
                }
                if (result == "valid") {
                    window.location.href = window.location.href;
                }
            }
        });
    }
}

function wishlist_manage(pid, type) {
    jQuery.ajax({
        url: 'wishlist_manage.php',
        type: 'post',
        data: 'pid=' + pid + '&type=' + type,
        success: function(result) {
            if ($.trim(result) == "not_login") {
                window.location.href = "login.php";
            } else {
                jQuery('.sicount').html(result);
            }
        }
    });
    jQuery('#user-img').addClass('blink');
    setTimeout(() => {
        $('#user-img').removeClass('blink');
    }, 3000);
    var icon = document.querySelector('.icon-position');
    icon.name = 'heart';
}

jQuery('.imageZoom').imgZoom();

function reveal() {
    var reveals = document.querySelectorAll(".reveal");
    for (var i = 0; i < reveals.length; i++) {
        var windowHeight = window.innerHeight;
        var elementTop = reveals[i].getBoundingClientRect().top;
        var elementVisible = 150;
        if (elementTop < windowHeight - elementVisible) {
            reveals[i].classList.add("active");
        } else {
            reveals[i].classList.remove("active");
        }
    }
}

function reveal2() {
    var reveals2 = document.querySelectorAll(".reveal2");
    for (var i = 0; i < reveals2.length; i++) {
        var windowHeight = window.innerHeight;
        var elementTop = reveals2[i].getBoundingClientRect().top;
        var elementVisible = 0;
        if (elementTop < windowHeight - elementVisible) {
            reveals2[i].classList.add("active");
        } else {
            reveals2[i].classList.remove("active");
        }
    }
}

function reveal3() {
    var reveals3 = document.querySelectorAll(".reveal3");
    for (var i = 0; i < reveals3.length; i++) {
        var windowHeight = window.innerHeight;
        var elementTop = reveals3[i].getBoundingClientRect().top;
        var elementVisible = 150;
        if (elementTop < windowHeight - elementVisible) {
            reveals3[i].classList.add("active");
        } else {
            reveals3[i].classList.remove("active");
        }
    }
}

window.addEventListener("scroll", reveal)
window.addEventListener("scroll", reveal2)
window.addEventListener("scroll", reveal3)

function myFunction(x) {
    if (x.matches) { // If media query matches
        jQuery('.removesap').removeClass('sap');
        jQuery('.removesap').removeClass('sap-m');
        jQuery('.repSize').css('font-size', '14px');
        jQuery('.dp').removeClass('imageZoom');
        jQuery('#myImg').removeAttr("data-origin");
        jQuery('.specs-head').remove('br');
    } else {
        jQuery('.removesap').addClass('sap');
        jQuery('.removesap').addClass('sap-m');
        jQuery('.repSize').css('font-size', '16px');
        jQuery('.dp').addClass('imageZoom');
    }
}

var x = window.matchMedia("(max-width: 426px)")
myFunction(x) // Call listener function at run time
x.addListener(myFunction)

const filterbtn = document.querySelector(".filterbtn");
filterbtn.addEventListener("click", () => {
    jQuery(".filterbox1").addClass("filterbox1_open");
    jQuery(".clearbtn").addClass("clearbtn_open");
})

const closebtn = document.querySelector(".closebtn");
closebtn.addEventListener("click", () => {
    jQuery(".filterbox1").removeClass("filterbox1_open");
    jQuery(".clearbtn").removeClass("clearbtn_open");
})