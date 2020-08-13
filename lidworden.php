<?php
include ('admin/includes/init.php');
include ('includes/header.php');

$soorten = Soortvoordeel::find_all ();
$voordelen = Voordeellid::find_all ();
?>
        <div class="blog-details pt-95 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="blog-details-info">
                            <h1>Hoe kan ik lid worden?</h1>

                            <?php
                            foreach ($soorten as $soort){
                                if (Voordeellid::count_all_per_soort ($soort->id) > 0){
                                    echo "<h3>$soort->name </h3>";
                                    //echo Voordeellid::count_all_per_soort ($soort->id);
                                    echo '<ul class="list-group list-group-flush">';
                                    foreach ($voordelen as $voordeel){
                                        if($voordeel->soortvoordeellid == $soort->id && $voordeel->weergeven == 1){
                                            echo "<li class='list-group-item'>$voordeel->tekst</li>";
                                        }
                                    }
                                    echo "</ul>";
                                }
                            }
                            ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- shopping-cart-area end -->
		<?php include ('includes/footer.php'); ?>