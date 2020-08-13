<?php
include ('admin/includes/init.php');
include ('includes/header.php');
$berichten = Bericht::find_all_order_id_desc();
$events = Event::find_all ();

?>

<!-- header end -->
<div class="slider-area">
    <div class="slider-active owl-carousel">
        <div class="single-slider single-slider-book1 bg-img" style="background-image: url(admin/img/zonnebloemveld.jpg)">
            <div class="container">
                <div class="slider-animation slider-content-book fadeinup-animated">
                    <h1 class="animated">Landelijke Gilde</h1>
                    <h2 class="animated">Houthulst</h2>
                    <!--<p class="animated">Samen beleef je meer!</p>-->

                </div>
            </div>
        </div>
        <div class="single-slider single-slider-book1 bg-img" style="background-image: url(admin/img/zonnebloemveld.jpg)">
            <div class="container">
                <div class="slider-animation slider-content-book fadeinup-animated">
                    <h1 class="animated">Landelijke Gilde</h1>
                    <h2 class="animated">Houthulst</h2>
                    <!--<p class="animated">Samen beleef je meer!</p>-->

                </div>
            </div>
        </div>
    </div>
</div>
<?php foreach ($berichten as $bericht): ?>
<div class="discount-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="discount-img">
                    <?php
                    $eventphoto = Event::find_by_id($bericht->eventid);
                    /*echo $eventphoto->name;*/
                    $images = Image::find_all ();
                    foreach ($images as $image){
                        if ($image->eventid == $eventphoto->id){
                            $photo = $image->picture_path ();
                        }
                    }
                    ?>
                    <img src="admin/<?php echo $photo; ?>" alt="" width="600" height="550">
                </div>
            </div>
            <div class="col-lg-5">
                <div class="discount-details-wrapper">
                    <h5><?php foreach ($events as $event){
                        if($event->id == $bericht->eventid){
                            echo $event->name;
                        }
                        } ?></h5>
                    <?php echo $bericht->tekst; ?>

                    <a class="discount-btn btn-hover" href="activiteit.php?id=<?php echo $bericht->eventid ?>">
                        Meer info over het evenement!
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
<?php include ('includes/footer.php');?>
