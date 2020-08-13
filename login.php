<?php
include ('admin/includes/init.php');
include ('includes/header.php');
ob_start ();
$the_message = '';

if($session->is_signed_in ()){
    redirect ("index.php");
}

if(isset($_POST['submit'])){
    $username = trim ($_POST['username']);
    $password = trim ($_POST['password']);

    /*Methode check de db of de user bestaat*/
    $user_found = User::verify_user($username, $password);

    if($user_found){
        $session->login ($user_found);
        redirect ("index.php");
    }else{
        $the_message = "Your password of username FAILED";
    }
}else{
    $username = "";
    $password = "";
}
?>
        <!-- login-area start -->
        <div class="register-area ptb-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-12 col-lg-6 col-xl-6 ml-auto mr-auto">
                        <div class="login">
                            <div class="login-form-container">
                                <div class="login-form">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <input type="text" name="username" placeholder="Username">
                                        <input type="password" name="password" placeholder="Password">
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <!--<input type="checkbox">
                                                <label>Remember me</label>-->
                                                <a href="#">Forgot Password?</a>
                                            </div>

                                        </div>
                                        <input type="submit" name="submit" value="Login" class="default-btn floatright">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- login-area end -->
<?php include ('includes/footer.php');?>
