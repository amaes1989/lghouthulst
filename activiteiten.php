<?php
include ('admin/includes/init.php');
include ('includes/header.php');

$events = Event::find_all_order_by_date_coming ();
$past_events = Event::find_all_order_by_date_past ();
$images = Image::find_all ();
?>
<!-- shopping-cart-area start -->
<div class="blog-area pt-95 pb-100">
    <div class="container">
        <div class="blog-mesonry">
            <h2>Komende evenementen</h2>
            <div class="row "> <!--grid-->
                <?php
                foreach ($events as $event) : ?>
                    <div class="col-lg-4 col-md-6 "> <!--grid-item-->
                    <div class="blog-wrapper mb-40">
                        <div class="blog-img">
                        <?php
                        foreach ($images as $image){
                            if($image->eventid == $event->id){
                                echo '<a href="activiteit.php?id=' . $event->id . '"><img src="admin/img/' . $image->name .'" alt="'. $image->alt .'"></a>';
                            }
                        }
                        ?>
                        </div>
                        <div class="blog-info-wrapper">
                            <div class="blog-meta">
                                <ul>
                                    <li><a href="#"><?php echo $event->wie ?></a></li>
                                    <li><?php echo $event->date ?></li>
                                </ul>
                            </div>
                            <h4><a href="#"><?php echo $event->name ?></a></h4>
                            <a class="blog-btn btn-hover" href="activiteit.php?id=<?php echo $event->id ?>">Bekijk activiteit</a>
                        </div>
                    </div>
                    </div>
                <?php endforeach;
                ?>

            </div>
            <h2>Voorbije evenementen</h2>
            <div class="row "> <!--grid-->
                <?php
                foreach ($past_events as $past_event) : ?>
                    <div class="col-lg-4 col-md-6 "> <!--grid-item-->
                        <div class="blog-wrapper mb-40">
                            <div class="blog-img">
                                <?php
                                foreach ($images as $image){
                                    if($image->eventid == $past_event->id){
                                        echo '<a href="#"><img src="admin/img/' . $image->name .'" alt="'. $image->alt .'"></a>';
                                    }
                                }
                                ?>
                            </div>
                            <div class="blog-info-wrapper">
                                <div class="blog-meta">
                                    <ul>
                                        <li><a href="#"><?php echo $past_event->wie ?></a></li>
                                        <li><?php echo $past_event->date ?></li>
                                    </ul>
                                </div>
                                <h4><a href="#"><?php echo $past_event->name ?></a></h4>
                                <a class="blog-btn btn-hover" href="activiteit.php?id=<?php echo $past_event->id ?>">Bekijk activiteit</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach;
                ?>

            </div>
        </div>
        <!--<div class="pagination-style mt-20 text-center">
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
<?php include ('includes/footer.php'); ?>