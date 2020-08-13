<?php
include ('admin/includes/init.php');
include ('includes/header.php');

$user = new User();

if (isset( $_POST['submit'] )) {
    if ($user) {
        $user->username = $_POST['username'];
        $user->first_name = $_POST['first_name'];
        $user->last_name = $_POST['last_name'];
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
        $user->street = $_POST['street'];
        $user->number = $_POST['number'];
        $user->zip = $_POST['zip'];
        $user->city = $_POST['city'];
        $user->phone = $_POST['phone'];
        if($_POST['functie']==7){
            $user->functie = 7;
        }else{
            $user->functie = 8;
        }

        $user->set_file($_FILES['user_image']);
        $user->save_user_and_image();
        /*$user->save ();*/
        redirect ('login.php');
    }
}
?>
        <!-- register-area start -->
        <div class="register-area ptb-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-12 col-lg-12 col-xl-6 ml-auto mr-auto">
                        <div class="login">
                            <div class="login-form-container">
                                <div class="login-form">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="username">Gebruikersnaam</label>
                                            <input type="text" name="username" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label for="first name">Voornaam</label>
                                            <input type="text" name="first_name" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label for="last name">Familienaam</label>
                                            <input type="text" name="last_name" class="form-control" ">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control" ">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Paswoord</label>
                                            <input type="password" name="password" class="form-control" ">
                                        </div>
                                        <div class="form-group">
                                            <label for="street">Straat</label>
                                            <input type="text" name="street" class="form-control" ">
                                        </div>
                                        <div class="form-group">
                                            <label for="number">Nummer</label>
                                            <input type="text" name="number" class="form-control" ">
                                        </div>
                                        <div class="form-group">
                                            <label for="zip">Postcode</label>
                                            <input type="text" name="zip" class="form-control" ">
                                        </div>
                                        <div class="form-group">
                                            <label for="city">Gemeente</label>
                                            <input type="text" name="city" class="form-control" ">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Telefoon</label>
                                            <input type="tel" name="phone" class="form-control" ">
                                        </div>
                                        <div class="form-group">
                                            <label for="functie">Lid / Geen lid?</label>
                                            <select name="functie" ><?php
                                                echo "<option value=7 >Lid</option>";
                                                echo "<option value=8 >Geen lid</option>";
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <img src="<?php echo $user->image_path_and_placeholder(); ?>" alt="" class="img-fluid" width="40" height="40">
                                            <label for="file">Kies een foto:</label>
                                            <input type="file" name="user_image" class="form-control">
                                        </div>
                                        <input type="submit" name="submit" value="Registreer" class="default-btn floatright">
                                        <!--<div class="button-box">
                                            <button type="submit" class="default-btn floatright">Registreer</button>
                                        </div>-->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- register-area end -->
		<?php include ('includes/footer.php');?>