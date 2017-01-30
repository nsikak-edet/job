<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo getSiteName() ?> <?php echo @$page_title; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon
    ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">

    <!-- Google Fonts
    ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- All css files are included here
    ============================================ -->
    <!-- Bootstrap CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo getAssetsURL() ?>css/bootstrap.min.css">

    <!-- This core.css file contents all plugins css file
    ============================================ -->
    <link rel="stylesheet" href="<?php echo getAssetsURL() ?>css/core.css">

    <!-- Theme shortcodes/elements style
    ============================================ -->
    <link rel="stylesheet" href="<?php echo getAssetsURL() ?>css/shortcode/shortcodes.css">

    <!-- Color Swithcer CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo getAssetsURL() ?>css/plugins/color-switcher.css">

    <!--  Theme main style
    ============================================ -->
    <link rel="stylesheet" href="<?php echo getAssetsURL() ?>style.css">

    <!-- Color CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo getAssetsURL() ?>css/plugins/color.css">

    <!-- Responsive CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo getAssetsURL() ?>css/responsive.css">

    <!-- Modernizr JS -->
    <script src="<?php echo getAssetsURL() ?>js/vendor/modernizr-2.8.3.min.js"></script>


</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!--Main Wrapper Start-->
<div class="as-mainwrapper">
    <!--Bg White Start-->
    <div class="bg-white">
        <!--Header Area Start-->
        <header id="sticky-header" class="header-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-xs-12">
                        <div class="logo"><a href="index.html"><img src="<?php echo getAssetsURL() ?>images/logo/logo.png" alt="JobHelp"></a></div>
                    </div>

                    <!-- MENU SECTION --->
                    <?php echo @$menu; ?>
                    <!-- /MENU SECTION -->

                </div>
            </div>

            <!-- MOBILE MENU SECTION --->
            <?php echo @$mobile_menu; ?>
            <!-- /MOBILE MENU SECTION -->


        </header>
        <!-- End of Header Area -->
        <!--Breadcrumb Banner Area Start-->
        <div class="breadcrumb-banner-area pt-150 bg-3 bg-opacity-black-60">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb-text">
                            <h2 class="text-center text-white uppercase mb-17">Job Board</h2>
                            <div class="breadcrumb-bar">
                                <ul class="breadcrumb text-center m-0">
                                    <li class="text-white uppercase ml-15 mr-15"><a href="index.html">Home</a></li>
                                    <li class="text-white uppercase ml-15 mr-15">Job Board</li>
                                </ul>
                            </div>
                        </div>
                        <form action="#" method="post">
                            <div class="form-container fix bg-opacity-blue-85 mt-125">
                                <div class="box-select">
                                    <div class="select large">
                                        <select name="category">
                                            <option>Keywords</option>
                                            <option>Finance</option>
                                            <option>Accountant</option>
                                            <option>Enginner</option>
                                            <option>Programmer</option>
                                            <option>Developer</option>
                                        </select>
                                    </div>
                                    <div class="select small">
                                        <select name="date">
                                            <option>All Regions</option>
                                            <option>Dhaka</option>
                                            <option>Shylet</option>
                                            <option>Khulna</option>
                                            <option>Barishal</option>
                                            <option>Chittagong</option>
                                        </select>
                                    </div>
                                    <div class="select medium">
                                        <select name="date">
                                            <option>Category</option>
                                            <option>Web Design</option>
                                            <option>Designing</option>
                                            <option>Development</option>
                                            <option>Programming</option>
                                            <option>Developing</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="button" class="button-dark pull-right">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Breadcrumb Banner Area-->
        <!--Start of Job Post Area-->
        <div class="job-post-area ptb-120">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center ">
                            <h2 class="uppercase">Recent Jobs</h2>
                            <div class="separator mt-35 mb-77">
                                <span><img src="images/icons/1.png" alt=""></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="job-post-container fix">
                            <div class="single-job-post fix">
                                <div class="job-title col-4 pl-30">
                                            <span class="pull-left block mtb-17">
                                                <a href="#"><img src="images/company-logo/1.png" alt=""></a>
                                            </span>
                                    <div class="fix pl-30 mt-29">
                                        <h4 class="mb-5">Graphic Designer</h4>
                                        <h5><a href="#">Devitems</a></h5>
                                    </div>
                                </div>
                                <div class="address col-4 pl-50">
                                            <span class="mtb-30 block">2020 Willshire Glen,<br>
                                            Alpharetta, GA-30009</span>
                                </div>
                                <div class="time-payment col-2 pl-60 text-center pt-22">
                                    <span class="block mb-6">€ 200.00</span>
                                    <a href="#" class="button button-red">Full Time</a>
                                </div>
                            </div>
                            <div class="single-job-post fix">
                                <div class="job-title col-4 pl-30">
                                            <span class="pull-left block mtb-17">
                                                <a href="#"><img src="images/company-logo/2.png" alt=""></a>
                                            </span>
                                    <div class="fix pl-30 mt-29">
                                        <h4 class="mb-5">Web Designer</h4>
                                        <h5><a href="#">Hastech</a></h5>
                                    </div>
                                </div>
                                <div class="address col-4 pl-50">
                                            <span class="mtb-30 block">2020 Willshire Glen,<br>
                                            Alpharetta, GA-30009</span>
                                </div>
                                <div class="time-payment col-2 pl-60 text-center pt-22">
                                    <span class="block mb-6">€ 450.00</span>
                                    <a href="#" class="button button-red">Full Time</a>
                                </div>
                            </div>
                            <div class="single-job-post fix">
                                <div class="job-title col-4 pl-30">
                                            <span class="pull-left block mtb-17">
                                                <a href="#"><img src="images/company-logo/3.png" alt=""></a>
                                            </span>
                                    <div class="fix pl-30 mt-29">
                                        <h4 class="mb-5">Print Designer</h4>
                                        <h5><a href="#">Bootexperts</a></h5>
                                    </div>
                                </div>
                                <div class="address col-4 pl-50">
                                            <span class="mtb-30 block">2020 Willshire Glen,<br>
                                            Alpharetta, GA-30009</span>
                                </div>
                                <div class="time-payment col-2 pl-60 text-center pt-22">
                                    <span class="block mb-6">€ 500.00</span>
                                    <a href="#" class="button button-dark-blue">Internship</a>
                                </div>
                            </div>
                            <div class="single-job-post fix">
                                <div class="job-title col-4 pl-30">
                                            <span class="pull-left block mtb-17">
                                                <a href="#"><img src="images/company-logo/4.png" alt=""></a>
                                            </span>
                                    <div class="fix pl-30 mt-29">
                                        <h4 class="mb-5">UI/UX Designer</h4>
                                        <h5><a href="#">CodeCarnival</a></h5>
                                    </div>
                                </div>
                                <div class="address col-4 pl-50">
                                            <span class="mtb-30 block">2020 Willshire Glen,<br>
                                            Alpharetta, GA-30009</span>
                                </div>
                                <div class="time-payment col-2 pl-60 text-center pt-22">
                                    <span class="block mb-6">€ 500.00</span>
                                    <a href="#" class="button button-red">Full Time</a>
                                </div>
                            </div>
                            <div class="single-job-post fix">
                                <div class="job-title col-4 pl-30">
                                            <span class="pull-left block mtb-17">
                                                <a href="#"><img src="images/company-logo/2.png" alt=""></a>
                                            </span>
                                    <div class="fix pl-30 mt-29">
                                        <h4 class="mb-5">Web Development</h4>
                                        <h5><a href="#">PowerBoosts</a></h5>
                                    </div>
                                </div>
                                <div class="address col-4 pl-50">
                                            <span class="mtb-30 block">2020 Willshire Glen,<br>
                                            Alpharetta, GA-30009</span>
                                </div>
                                <div class="time-payment col-2 pl-60 text-center pt-22">
                                    <span class="block mb-6">€ 500.00</span>
                                    <a href="#" class="button">Part Time</a>
                                </div>
                            </div>
                            <div class="single-job-post fix">
                                <div class="job-title col-4 pl-30">
                                            <span class="pull-left block mtb-17">
                                                <a href="#"><img src="images/company-logo/2.png" alt=""></a>
                                            </span>
                                    <div class="fix pl-30 mt-29">
                                        <h4 class="mb-5">Web Development</h4>
                                        <h5><a href="#">PowerBoosts</a></h5>
                                    </div>
                                </div>
                                <div class="address col-4 pl-50">
                                            <span class="mtb-30 block">2020 Willshire Glen,<br>
                                            Alpharetta, GA-30009</span>
                                </div>
                                <div class="time-payment col-2 pl-60 text-center pt-22">
                                    <span class="block mb-6">€ 500.00</span>
                                    <a href="#" class="button">Part Time</a>
                                </div>
                            </div>
                            <div class="single-job-post fix">
                                <div class="job-title col-4 pl-30">
                                            <span class="pull-left block mtb-17">
                                                <a href="#"><img src="images/company-logo/4.png" alt=""></a>
                                            </span>
                                    <div class="fix pl-30 mt-29">
                                        <h4 class="mb-5">UI/UX Designer</h4>
                                        <h5><a href="#">CodeCarnival</a></h5>
                                    </div>
                                </div>
                                <div class="address col-4 pl-50">
                                            <span class="mtb-30 block">2020 Willshire Glen,<br>
                                            Alpharetta, GA-30009</span>
                                </div>
                                <div class="time-payment col-2 pl-60 text-center pt-22">
                                    <span class="block mb-6">€ 500.00</span>
                                    <a href="#" class="button button-red">Full Time</a>
                                </div>
                            </div>
                            <div class="single-job-post fix">
                                <div class="job-title col-4 pl-30">
                                            <span class="pull-left block mtb-17">
                                                <a href="#"><img src="images/company-logo/3.png" alt=""></a>
                                            </span>
                                    <div class="fix pl-30 mt-29">
                                        <h4 class="mb-5">Print Designer</h4>
                                        <h5><a href="#">Bootexperts</a></h5>
                                    </div>
                                </div>
                                <div class="address col-4 pl-50">
                                            <span class="mtb-30 block">2020 Willshire Glen,<br>
                                            Alpharetta, GA-30009</span>
                                </div>
                                <div class="time-payment col-2 pl-60 text-center pt-22">
                                    <span class="block mb-6">€ 500.00</span>
                                    <a href="#" class="button button-dark-blue">Internship</a>
                                </div>
                            </div>
                            <div class="single-job-post fix">
                                <div class="job-title col-4 pl-30">
                                            <span class="pull-left block mtb-17">
                                                <a href="#"><img src="images/company-logo/2.png" alt=""></a>
                                            </span>
                                    <div class="fix pl-30 mt-29">
                                        <h4 class="mb-5">Graphic Designer</h4>
                                        <h5><a href="#">Devitems</a></h5>
                                    </div>
                                </div>
                                <div class="address col-4 pl-50">
                                            <span class="mtb-30 block">2020 Willshire Glen,<br>
                                            Alpharetta, GA-30009</span>
                                </div>
                                <div class="time-payment col-2 pl-60 text-center pt-22">
                                    <span class="block mb-6">€ 200.00</span>
                                    <a href="#" class="button button-red">Full Time</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Job Post Area -->
        <!--Start of Job Post Area-->
        <div class="job-post-area pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center ">
                            <h2 class="uppercase">Featured Jobs</h2>
                            <div class="separator mt-35 mb-77">
                                <span><img src="images/icons/1.png" alt=""></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="job-post-container fix">
                            <div class="single-job-post fix">
                                <div class="job-title col-4 pl-30">
                                            <span class="pull-left block mtb-17">
                                                <a href="#"><img src="images/company-logo/1.png" alt=""></a>
                                            </span>
                                    <div class="fix pl-30 mt-29">
                                        <h4 class="mb-5">Graphic Designer</h4>
                                        <h5><a href="#">Devitems</a></h5>
                                    </div>
                                </div>
                                <div class="address col-4 pl-50">
                                            <span class="mtb-30 block">2020 Willshire Glen,<br>
                                            Alpharetta, GA-30009</span>
                                </div>
                                <div class="time-payment col-2 pl-60 text-center pt-22">
                                    <span class="block mb-6">€ 200.00</span>
                                    <a href="#" class="button button-red">Full Time</a>
                                </div>
                            </div>
                            <div class="single-job-post fix">
                                <div class="job-title col-4 pl-30">
                                            <span class="pull-left block mtb-17">
                                                <a href="#"><img src="images/company-logo/2.png" alt=""></a>
                                            </span>
                                    <div class="fix pl-30 mt-29">
                                        <h4 class="mb-5">Web Designer</h4>
                                        <h5><a href="#">Hastech</a></h5>
                                    </div>
                                </div>
                                <div class="address col-4 pl-50">
                                            <span class="mtb-30 block">2020 Willshire Glen,<br>
                                            Alpharetta, GA-30009</span>
                                </div>
                                <div class="time-payment col-2 pl-60 text-center pt-22">
                                    <span class="block mb-6">€ 450.00</span>
                                    <a href="#" class="button button-red">Full Time</a>
                                </div>
                            </div>
                            <div class="single-job-post fix">
                                <div class="job-title col-4 pl-30">
                                            <span class="pull-left block mtb-17">
                                                <a href="#"><img src="images/company-logo/3.png" alt=""></a>
                                            </span>
                                    <div class="fix pl-30 mt-29">
                                        <h4 class="mb-5">Print Designer</h4>
                                        <h5><a href="#">Bootexperts</a></h5>
                                    </div>
                                </div>
                                <div class="address col-4 pl-50">
                                            <span class="mtb-30 block">2020 Willshire Glen,<br>
                                            Alpharetta, GA-30009</span>
                                </div>
                                <div class="time-payment col-2 pl-60 text-center pt-22">
                                    <span class="block mb-6">€ 500.00</span>
                                    <a href="#" class="button">Part Time</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Job Post Area -->

        <!-- FOOTER AREA --->
        <?php echo @$footer; ?>
        <!-- /FOOTER AREA -->

    </div>
    <!--End of Bg White-->
</div>
<!--End of Main Wrapper Area-->

<!--Start of Login Form-->
<div id="quickview-login">
    <!-- Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="zmdi zmdi-close"></i></span></button>
                </div>
                <div class="modal-body">
                    <div class="form-pop-up-content ptb-60 pl-60 pr-60">
                        <div class="area-title text-center mb-43">
                            <h2 class="pt-7 pb-7 pl-40 pr-40">Login</h2>
                        </div>
                        <form method="post" action="#">
                            <div class="form-box">
                                <input type="text" name="username" placeholder="User Name" class="mb-14">
                                <input type="password" name="pass" placeholder="Password">
                            </div>
                            <div class="fix ptb-30">
                                <span class="remember pull-left"><input class="p-0 pull-left" type="checkbox">Remember Me</span>
                                <span class="pull-right"><a href="#">Forget Password?</a></span>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="text-uppercase">SignIn</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Login Form-->


<!-- jquery latest version
========================================================= -->
<script src="<?php echo getAssetsURL() ?>js/vendor/jquery-1.12.4.min.js"></script>

<!-- Bootstrap framework js
========================================================= -->
<script src="<?php echo getAssetsURL() ?>js/bootstrap.min.js"></script>

<!-- Owl Carousel js
========================================================= -->
<script src="<?php echo getAssetsURL() ?>js/owl.carousel.min.js"></script>

<!-- nivo slider js
========================================================= -->
<script src="<?php echo getAssetsURL() ?>lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
<script src="<?php echo getAssetsURL() ?>lib/nivo-slider/home.js" type="text/javascript"></script>

<!-- Js plugins included in this file
========================================================= -->
<script src="<?php echo getAssetsURL() ?>js/plugins.js"></script>

<!-- Video Player JS
========================================================= -->
<script src="<?php echo getAssetsURL() ?>js/jquery.mb.YTPlayer.js"></script>

<!-- AJax Mail JS
========================================================= -->
<script src="<?php echo getAssetsURL() ?>js/ajax-mail.js"></script>

<!-- Mail Chimp JS
========================================================= -->
<script src="<?php echo getAssetsURL() ?>js/jquery.ajaxchimp.min.js"></script>

<!-- StyleSwitch JS
========================================================= -->
<script src="<?php echo getAssetsURL() ?>js/styleswitch.js"></script>

<!-- Waypoint Js
========================================================= -->
<script src="<?php echo getAssetsURL() ?>js/waypoints.min.js"></script>

<!-- Main js file contents all jQuery plugins activation
========================================================= -->
<script src="<?php echo getAssetsURL() ?>js/main.js"></script>

</body>
</html>