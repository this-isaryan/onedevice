<?php
require('top.php');
?>
<div class="alert-box">
    <img src="images/error.png" alt="error" class="alert-img">
    <p class="alert-msg">Error Message</p>
</div>
<div class="alert-box-done">
    <img src="images/done.png" alt="done" class="alert-img">
    <p class="alert-mesg">Error Message</p>
</div>
<!-- Start Contact Area -->
<section class="htc__contact__area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="contact-form-wrap mt--60">
                <div class="col-xs-12 mb--20">
                    <div class="contact-title">
                        <h2 class="title__line--6">SEND A MAIL</h2>
                    </div>
                </div>
                <div class="col-xs-12">
                    <form id="contact-form" action="#" method="post">
                        <div class="single-contact-form">
                            <div class="contact-box name">
                                <input type="text" id="name" name="name" placeholder="Please enter your Name">
                                <input type="email" id="email" name="email" placeholder="Please enter your Email">
                                <input type="tel" id="mobile" name="mobile" placeholder="Please enter your Mobile">
                            </div>
                        </div>

                        <div class="single-contact-form">
                            <div class="contact-box message">
                                <textarea name="message" id="message" placeholder="Your Message"></textarea>
                            </div>
                        </div>
                        <div class="contact-btn">
                            <button type="button" onclick="send_message()" class="submit-btn">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    input {
		display: block;
		height: 40px !important;
		width: 100%;
		padding: 0 20px !important;
		border: none;
		outline: none;
		box-shadow: 0 4px 10px rgba(0, 0, 0, 0.01);
		color: #495057 !important;
		background-clip: padding-box !important;
		border-radius: 20px;
		transition: all 0.15s ease-in-out;
		font-weight: 500;
	}

    textarea{
        display: block;
        width: 100% !important;
        outline: none;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.01);
		color: #495057 !important;
		background-clip: padding-box !important;
		border-radius: 20px;
		transition: all 0.15s ease-in-out;
		font-weight: 500;

    }

	input:focus,
	input:focus-within,
	textarea:focus,
	textarea:focus-within {
		box-shadow: 0px 0.2em 0.75em #c4c4c4;
	}

	::placeholder {
		color: #495057 !important;
		text-transform: capitalize;
	}
</style>
<!-- End Contact Area -->
<?php require('footer.php') ?>