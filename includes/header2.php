<?php
ob_start ();
$events = Event::find_all_order_by_date_coming ();
if($session->is_signed_in ()){
   /* redirect ("index.php");*/
    $user = User::find_by_id ($session->user_id);
}

?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta http-equiv="refresh" content="10; url=mijnbestellingen.php?id=<?php echo $user->id; ?>">
        <title>Landelijke Gilde Houthulst</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image" href="./admin/img/logo.jpg">
		
		<!-- all css here -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/themify-icons.css">
        <link rel="stylesheet" href="assets/css/pe-icon-7-stroke.css">
        <link rel="stylesheet" href="assets/css/icofont.css">
        <link rel="stylesheet" href="assets/css/meanmenu.min.css">
        <link rel="stylesheet" href="assets/css/bundle.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- header start -->
        <header>
            <div class="header-top-furniture wrapper-padding-2 res-header-sm">
                <div class="container-fluid">
                    <div class="header-bottom-wrapper">
                        <div class="logo-2 furniture-logo ptb-30">
                            <a href="index.php">
                                <img src="./admin/img/logo_groot.jpg" alt="logo landelijke gilde" width="150">
                            </a>
                        </div>
                        <div class="menu-style-2 furniture-menu menu-hover">
                            <nav>
                                <ul>
                                    <li><a href="index.php">home</a>

                                    </li>
                                    <li><a href="bestuur.php">Bestuur</a>

                                    </li>
                                    <li><a href="lidworden.php">Lid worden?</a></li>
                                    <li><a href="activiteiten.php">Activiteiten</a>
                                        <!--<div class="category-menu-dropdown shop-menu">
                                            <div class="category-dropdown-style category-common2 mb-30">
                                                <ul>
                                                    <?php
/*                                                    foreach ($events as $event){
                                                        echo '<li><a href="activiteit.php?id='.$event->id.'">' . $event->name . ' op '. $event->date .'</a></li>';
                                                    }
                                                    */?>
                                                </ul>
                                            </div>

                                        </div>--->
                                    </li>

                                    <!--<li><a href="contact.html">contact</a></li>-->
                                </ul>
                            </nav>
                        </div>
                        <div class="header-cart">
                            <!--<a class="icon-cart-furniture" href="#">
                                <i class="ti-shopping-cart"></i>
                                <span class="shop-count-furniture green">02</span>
                            </a>-->
                            <!--<ul class="cart-dropdown">
                                <li class="single-product-cart">
                                    <div class="cart-img">
                                        <a href="#"><img src="assets/img/cart/1.jpg" alt=""></a>
                                    </div>
                                    <div class="cart-title">
                                        <h5><a href="#"> Bits Headphone</a></h5>
                                        <h6><a href="#">Black</a></h6>
                                        <span>$80.00 x 1</span>
                                    </div>
                                    <div class="cart-delete">
                                        <a href="#"><i class="ti-trash"></i></a>
                                    </div>
                                </li>
                                <li class="single-product-cart">
                                    <div class="cart-img">
                                        <a href="#"><img src="assets/img/cart/2.jpg" alt=""></a>
                                    </div>
                                    <div class="cart-title">
                                        <h5><a href="#"> Bits Headphone</a></h5>
                                        <h6><a href="#">Black</a></h6>
                                        <span>$80.00 x 1</span>
                                    </div>
                                    <div class="cart-delete">
                                        <a href="#"><i class="ti-trash"></i></a>
                                    </div>
                                </li>
                                <li class="single-product-cart">
                                    <div class="cart-img">
                                        <a href="#"><img src="assets/img/cart/3.jpg" alt=""></a>
                                    </div>
                                    <div class="cart-title">
                                        <h5><a href="#"> Bits Headphone</a></h5>
                                        <h6><a href="#">Black</a></h6>
                                        <span>$80.00 x 1</span>
                                    </div>
                                    <div class="cart-delete">
                                        <a href="#"><i class="ti-trash"></i></a>
                                    </div>
                                </li>
                                <li class="cart-space">
                                    <div class="cart-sub">
                                        <h4>Subtotal</h4>
                                    </div>
                                    <div class="cart-price">
                                        <h4>$240.00</h4>
                                    </div>
                                </li>
                                <li class="cart-btn-wrapper">
                                    <a class="cart-btn btn-hover" href="#">view cart</a>
                                    <a class="cart-btn btn-hover" href="#">checkout</a>
                                </li>
                            </ul>-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="mobile-menu-area d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                            <div class="mobile-menu">
                                <nav id="mobile-menu-active">
                                    <ul class="menu-overflow">
                                        <li><a href="index.php">HOME</a>
                                        </li>
                                        <li><a href="bestuur.php">Bestuur</a>
                                        </li>
                                        <li><a href="lidworden.php">Lid worden?</a>
                                        </li>
                                        <li><a href="activiteiten.php">Activiteiten</a>
                                        </li>
                                        <!--<li><a href="contact.html"> Contact  </a></li>-->
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
            <div class="header-bottom-furniture wrapper-padding-2 border-top-3">
                <div class="container-fluid">
                    <div class="furniture-bottom-wrapper">
                        <div class="furniture-login">
                            <ul>
                            <?php
                            if($session->is_signed_in ()){
                                echo '<li><a href="index.php">Welkom ' . $user->first_name . " " . $user->last_name .'</a></li>';

                                echo '<li><a href="mijnbestellingen.php?id=' . $user->id . '">Mijn bestellingen</a></li>';
                                echo '<li><a href="edit_user.php?id=' . $user->id . '">Mijn account</a></li>';

                                echo '<li><a href="logout.php">Uitloggen </a></li>';
                            }else{
                                echo '<li>Krijg toegang: <a href="login.php">Login </a></li>';
                                echo '<li><a href="register.php">Registreer </a></li>';
                            }
                            ?>
                            </ul>
                        </div>
                        <div class="furniture-search">
                            <!--<form action="#">
                                <input placeholder="I am Searching for . . ." type="text">
                                <button>
                                    <i class="ti-search"></i>
                                </button>
                            </form>-->
                        </div>
                        <div class="furniture-wishlist">
                            <!--<ul>
                                <li><a data-toggle="modal" data-target="#exampleCompare" href="#"><i class="ti-reload"></i> Compare</a></li>
                                <li><a href="wishlist.html"><i class="ti-heart"></i> Wishlist</a></li>
                            </ul>-->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header end -->
