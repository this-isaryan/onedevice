<footer id="htc__footer">
    <!-- Start Footer Widget -->
    <div class="footer__container bg__cat--1">
        <div class="container">
            <div class="row">
                <!-- Start Single Footer Widget -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <a href='/ecom'><img src="images/Logo2.png" class="brand-logo3" alt="Logo"></a>
                    <div class="footer">
                        <h2 class="title__line--2">ABOUT US</h2>
                        <div class="ft__details">
                            <p>We at are your one-stop-shop for all of your electronics needs. Not only do we have the best products at the most competitive prices, but we also provide quick and efficient customer service to ensure your
                                experience is exceptional. We serve customers in our local region as well as across the nation.</p>
                        </div>
                    </div>
                </div>
                <!-- End Single Footer Widget -->
                <!-- Start Single Footer Widget -->
                <div class="col-md-2 col-sm-6 col-xs-12 xmt-40">
                    <div class="footer">
                        <h2 class="title__line--2">information</h2>
                        <div class="ft__inner">
                            <ul class="ft__list">
                                <li><a href="About_Us.html" target="_blank">About us</a></li>
                                <li><a href="Privacy_policy.html" target="_blank">Privacy & Policy</a></li>
                                <li><a href="terms_and_conditions.html" target="_blank">Terms & Condition</a></li>
                                <li><a href="contact.php">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Footer Widget -->
                <!-- Start Single Footer Widget -->
                <div class="col-md-2 col-sm-6 col-xs-12 xmt-40 smt-40">
                    <div class="footer">
                        <h2 class="title__line--2">my account</h2>
                        <div class="ft__inner">
                            <ul class="ft__list">
                                <?php if (isset($_SESSION['USER_LOGIN'])) { ?>
                                    <li><a href="profile.php">My Account</a></li>
                                    <li><a href="logout.php">Log Out</a></li>
                                    <li><a href="wishlist.php">Wishlist</a></li>
                                <?php } else { ?>
                                    <li><a href="profile.php">My Account</a></li>
                                    <li><a href="login.php">Login</a></li>
                                    <li><a href="wishlist.php">Wishlist</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Footer Widget -->
                <!-- Start Single Footer Widget -->
                <div class="col-md-2 col-sm-6 col-xs-12 xmt-40 smt-40">
                    <div class="footer">
                        <h2 class="title__line--2">Our categories</h2>
                        <div class="ft__inner">
                            <ul class="ft__list">
                                <li><a href="mobiles.php" class="menu-item under">Mobiles</a></li>
                                <li><a href="tablets.php" class="menu-item under">Tablets</a></li>
                                <li><a href="laptops.php" class="menu-item under">Laptops</a></li>
                                <li><a href="audios.php" class="menu-item under">Audios</a></li>
                                <li><a href="smartwatch.php" class="menu-item under">Smart Watch</a></li>
                                <li><a href="television.php" class="menu-item under">Television</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Footer Widget -->
            </div>
        </div>
    </div>
    <!-- End Footer Widget -->
    <!-- Start Copyright Area -->
    <div class="htc__copyright bg__cat--5">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="copyright__inner">
                        <p>Copyright© <a href="/">One Device</a> <?php echo date('Y') ?>. All right reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Copyright Area -->
</footer>
<!-- End Footer Style -->
</div>
<!-- Body main wrapper end -->

<!-- Placed js at the end of the document so the pages load faster -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="js/navfunction.js"></script>
<!-- jquery latest version -->
<script src="js/vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap framework js -->
<script src="js/bootstrap.min.js"></script>
<!-- All js plugins included in this file. -->
<script src="js/plugins.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/glider.min.js"></script>
<script>
    new Glider(document.querySelector('.glider'), {
        slidesToShow: 5,
        slidesToScroll: 1,
        draggable: true,
        dots: '.dots',
        arrows: {
            prev: '.glider-prev',
            next: '.glider-next'
        },

        responsive: [{
            // screens greater than >= 775px
            breakpoint: 1200,
            settings: {
                // Set to `auto` and provide item width to adjust to viewport
                slidesToShow: 4,
                slidesToScroll: 3
            }
        }, {
            // screens greater than >= 1024px
            breakpoint: 900,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        }, {
            // screens greater than >= 1024px
            breakpoint: 640,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        }, {
            // screens greater than >= 1024px
            breakpoint: 304,
            settings: {
                slidesToShow: 1.5,
                slidesToScroll: 1
            }
        }, {
            // screens greater than >= 1024px
            breakpoint: 0,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
<script>
    window.cookieconsent.initialise({
        "palette": {
            "popup": {
                "background": "#edeff5",
                "text": "#838391"
            },
            "button": {
                "background": "#4dc3f2",
                "text": "#ffffff"
            }
        },
        "content": {
            "message": "This website uses cookies to ensure you get the best experience on our website.",
            "dismiss": "Agree",
            "link": "Cookie Ploicy",
            "href": "https://onedevice.in/Cookie_policy.html"
        }
    });
</script>
<!-- Waypoints.min.js. -->
<script src="js/waypoints.min.js"></script>
<!-- Main js file that contents all jQuery plugins activation. -->
<script src="js/main.js"></script>
<script src="js/jquery.imgzoom.js"></script>
<script src="js/custom.js"></script>

</body>

</html>