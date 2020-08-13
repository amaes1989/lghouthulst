<?php
include ("admin/includes/init.php");
include("includes/header.php");

$users = User::find_all_order_by_functie ();
?>
    <div class="breadcrumb-area pt-205 pb-210" style="background-image: url(admin/img/cows.jpg); height=500px; background-repeat: no-repeat;">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>Bestuur</h2>
                <!--<ul>
                    <li><a href="#">home</a></li>
                    <li> blog 2 column</li>
                </ul>-->
            </div>
        </div>
    </div>
<!-- shopping-cart-area start -->
<div class="blog-area pt-95 pb-100">
    <div class="container">
        <div class="blog-mesonry">
            <div class="row grid">
                <?php foreach ($users as $user): ?>
                <div class="col-lg-6 col-md-6 grid-item">
                    <div class="blog-wrapper mb-40">
                        <div class="blog-img">
                            <a href="#"><img src="<?php  echo 'admin/img/users/' . $user->user_image ?>" alt=""></a>
                        </div>
                        <div class="blog-info-wrapper">

                            <h4><?php echo $user->first_name . " " . $user->last_name; ?></h4>
                            <p><?php switch ($user->functie){
                                    case 1:
                                        echo "Voorzitter";
                                        break;
                                    case 2:
                                        echo "Ondervoorzitter";
                                        break;
                                    case 3:
                                        echo "Penningmeester";
                                        break;
                                    case 4:
                                        echo "Secretaris + fotograaf";
                                        break;
                                    case 5:
                                        echo "Website + uitnodigingen";
                                        break;
                                    case 6:
                                        echo "Bestuurslid";
                                        break;
                            }
                            ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <!--<div class="col-lg-6 col-md-6 grid-item">
                    <div class="blog-wrapper mb-40">
                        <div class="blog-img">
                            <a href="#"><img src="assets/img/blog/5.jpg" alt=""></a>
                        </div>
                        <div class="blog-info-wrapper">
                            <div class="blog-meta">
                                <ul>
                                    <li><a href="#">Fashion </a></li>
                                    <li>October 26, 2018</li>
                                </ul>
                            </div>
                            <h4><a href="#">Alix Debuts a Swim Line for Spring 2016.</a></h4>
                            <p>Formfitting clothing is all about a sweet spot. That elusive place where an item is tight but not clingy, sexy but not cloying, </p>
                            <a class="blog-btn btn-hover" href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 grid-item">
                    <div class="blog-wrapper mb-40">
                        <div class="blog-img">
                            <a href="#"><img src="assets/img/blog/6.jpg" alt=""></a>
                        </div>
                        <div class="blog-info-wrapper">
                            <div class="blog-meta">
                                <ul>
                                    <li><a href="#">Fashion </a></li>
                                    <li>October 26, 2018</li>
                                </ul>
                            </div>
                            <h4><a href="#">Plucked From Our Favorite Painting And Drawing</a></h4>
                            <p>Formfitting clothing is all about a sweet spot. That elusive place where an item is tight but not clingy, sexy but not cloying, </p>
                            <a class="blog-btn btn-hover" href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 grid-item">
                    <div class="blog-wrapper mb-40">
                        <div class="blog-img">
                            <a href="#"><img src="assets/img/blog/9.jpg" alt=""></a>
                        </div>
                        <div class="blog-info-wrapper">
                            <div class="blog-meta">
                                <ul>
                                    <li><a href="#">Fashion </a></li>
                                    <li>October 26, 2018</li>
                                </ul>
                            </div>
                            <h4><a href="#">Plucked From Our Favorite Painting And Drawing.</a></h4>
                            <p>Formfitting clothing is all about a sweet spot. That elusive place where an item is tight but not clingy, sexy but not cloying, </p>
                            <a class="blog-btn btn-hover" href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 grid-item">
                    <div class="blog-wrapper mb-40">
                        <div class="blog-img">
                            <a href="#"><img src="assets/img/blog/7.jpg" alt=""></a>
                        </div>
                        <div class="blog-info-wrapper">
                            <div class="blog-meta">
                                <ul>
                                    <li><a href="#">Fashion </a></li>
                                    <li>October 26, 2018</li>
                                </ul>
                            </div>
                            <h4><a href="#">5 Things You Didn’t Know About Kim Kardashian West.</a></h4>
                            <p>Formfitting clothing is all about a sweet spot. That elusive place where an item is tight but not clingy, sexy but not cloying, cool but not over the top. Alexandra Alvarez’s label, Alix, hits that mark with its range of comfortable,
                                minimal, and neutral-hued bodysuits. </p>
                            <a class="blog-btn btn-hover" href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 grid-item">
                    <div class="blog-wrapper mb-40">
                        <div class="blog-img">
                            <a href="#"><img src="assets/img/blog/8.jpg" alt=""></a>
                        </div>
                        <div class="blog-info-wrapper">
                            <div class="blog-meta">
                                <ul>
                                    <li><a href="#">Fashion </a></li>
                                    <li>October 26, 2018</li>
                                </ul>
                            </div>
                            <h4><a href="#">Alix Debuts a Swim Line for Spring 2016.</a></h4>
                            <p>Formfitting clothing is all about a sweet spot. That elusive place where an item is tight but not clingy, sexy but not cloying, </p>
                            <a class="blog-btn btn-hover" href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 grid-item">
                    <div class="blog-wrapper mb-40">
                        <div class="blog-img">
                            <a href="#"><img src="assets/img/blog/12.jpg" alt=""></a>
                        </div>
                        <div class="blog-info-wrapper">
                            <div class="blog-meta">
                                <ul>
                                    <li><a href="#">Fashion </a></li>
                                    <li>October 26, 2018</li>
                                </ul>
                            </div>
                            <h4><a href="#">Alix Debuts a Swim Line for Spring 2016.</a></h4>
                            <p>Formfitting clothing is all about a sweet spot. That elusive place where an item is tight but not clingy, sexy but not cloying, </p>
                            <a class="blog-btn btn-hover" href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 grid-item">
                    <div class="blog-wrapper mb-40">
                        <div class="blog-img">
                            <a href="#"><img src="assets/img/blog/10.jpg" alt=""></a>
                        </div>
                        <div class="blog-info-wrapper">
                            <div class="blog-meta">
                                <ul>
                                    <li><a href="#">Fashion </a></li>
                                    <li>October 26, 2018</li>
                                </ul>
                            </div>
                            <h4><a href="#">5 Things You Didn’t Know About Kim Kardashian West.</a></h4>
                            <p>Formfitting clothing is all about a sweet spot. That elusive place where an item is tight but not clingy, sexy but not cloying, cool but not over the top. Alexandra Alvarez’s label, Alix, hits that mark with its range of comfortable,
                                minimal, and neutral-hued bodysuits. </p>
                            <a class="blog-btn btn-hover" href="#">Read More</a>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
       <!-- <div class="pagination-style mt-20 text-center">
            <ul>
                <li><a href="#"><i class="ti-angle-left"></i></a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">...</a></li>
                <li><a href="#">19</a></li>
                <li class="active"><a href="#"><i class="ti-angle-right"></i></a></li>
            </ul>
        </div>-->
    </div>
</div>
<!-- shopping-cart-area end -->
<?php
include ("includes/footer.php");
?>