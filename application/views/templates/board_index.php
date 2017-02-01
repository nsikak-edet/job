<!doctype html>
<html class="no-js" lang="en">
<head>
    <style>
        .btn-file {
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }
    </style>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo getSiteName() ?> <?php echo (@$page_title != '') ? ' | ' . $page_title : ''; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon
    ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo getAssetsURL() ?>images/favicon.ico">

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
    <link rel="stylesheet" href="<?php echo getAssetsURL() ?>css/datepicker.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/angular-block-ui-master/src/angular-block-ui/angular-block-ui.css"/>

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
                        <div class="logo"><a href="<?php echo base_url(); ?>"><img src="<?php echo getAssetsURL() ?>images/logo/logo.png" alt="JobHelp"></a></div>
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
                        <form action="<?php echo base_url() ?>portal/search" method="get">
                            <div class="form-container fix bg-opacity-blue-85 mt-125">
                                <div class="box-select">
                                    <div class="select large">
                                        <input class="select" name="search-keyword" type="text" placeholder="enter job title" />
                                    </div>
                                    <div class="select small">
                                        <select name="job_location">
                                            <option valud="0">All Locations</option>
                                            <!-- Job Locations  --->
                                            <?php foreach(@$job_locations as $job_location){
                                                $name = $job_location->name;
                                                $id = $job_location->id;
                                                echo "<option value='$id'>$name</option>";
                                            } ?>

                                        </select>
                                    </div>
                                    <div class="select medium">
                                        <select name="job_category">
                                            <option valud="0">All Category</option>
                                            <!-- Job Categories  --->
                                            <?php foreach(@$job_categories as $job_category){
                                                $name = $job_category->name;
                                                $id = $job_category->id;
                                                echo "<option value='$id'>$name</option>";
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="button-dark pull-right">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Breadcrumb Banner Area-->

        <!--Start of Account Area-->
        <div class="account-area pt-70 mb-120">
            <?php echo $body ?>
        </div>
        <!--End of Account Area-->

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
                        <div class="area-title text-center mb-23">
                            <h3 class="pt-7 pb-7 pl-40 pr-40"><i class="fa fa-key"></i> Secured Login</h3>
                        </div>
                        <form method="post" action="<?php echo base_url() ?>account/login" id="loginForm">
                            <div class="form-box">
                                <input type="text" name="username" placeholder="username (e.g. you@email.com)" class="mb-14">
                                <div class="text-danger mb-1 username_error" ></div>
                                <input type="password" name="pass" placeholder="Password">
                                <div class="text-danger pass_error" ></div>
                            </div>
                            <div class="fix ptb-10">
<!--                                <span class="remember pull-left"><input class="p-0 pull-left" type="checkbox">Remember Me</span>-->
<!--                                <span class="pull-right"><a href="#">Forget Password?</a></span>-->
                            </div>
                            <div class="text-center">
                                <button type="submit" class="text-uppercase" id="login"> Login</button>
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

<!-- After AngularJS -->
<script src="<?php echo base_url() ?>assets/blockui-master/jquery.blockUI.js"></script>

<!-- Main js file contents all jQuery plugins activation
========================================================= -->
<script src="<?php echo getAssetsURL() ?>js/main.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

<!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>

<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>

<!--- angular js ---->
<script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.5.2/angular.min.js"></script>

<!--- custom js ---->
<script src = "<?php echo getAssetsURL() ?>js/customjs/custom.js"></script>

</body>
</html>