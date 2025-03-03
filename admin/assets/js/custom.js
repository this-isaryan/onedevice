function admin_login() {
    const email = jQuery("#email").val();
    const password = jQuery("#password").val();

    if (email == "") {
        showAlert('Please enter username');
    } else if (password == "") {
        showAlert('Please enter password');
    } else {
        jQuery.ajax({
            url: 'login_submit.php',
            type: 'post',
            data: 'username=' + email + '&password=' + password,
            success: function(result) {
                if (result == "Incorrect Login Details") {
                    showAlert(result);
                }
                if (result == "valid") {
                    window.location.href = 'index.php';
                }
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

const showBtnFn = () => {
    const showBtn = document.querySelector('.show-btn');
    if (password.type === 'password') {
        showBtn.innerHTML = '<ion-icon name="eye-off-outline"></ion-icon>';
        password.type = "text";
    } else {
        showBtn.innerHTML = '<ion-icon name="eye-outline"></ion-icon>';
        password.type = "password";
    }
}