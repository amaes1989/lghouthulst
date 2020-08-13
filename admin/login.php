<?php ob_start (); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Analytics Dashboard - This is an example dashboard created using build-in elements and components.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
    <!--<link rel="stylesheet" href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">-->
    <link href="css/main.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- <script src="cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"/>-->

</head>

<?php
include("includes/init.php");
$the_message = '';

if($session->is_signed_in ()){
    redirect ("index.php");
}

if(isset($_POST['submit'])){
    $username = trim ($_POST['username']);
    $password = trim ($_POST['password']);

    /*Methode check de db of de user bestaat*/
    $user_found = User::verify_user_admin($username, $password);

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

<body>

<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"><img src="img/cow.jpg" width="520" height="370" alt="koe"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    <h2 class="bg-danger"><?php echo $the_message; ?></h2>
                                </div>
                                <form class="user" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="username" id="username" aria-describedby="emailHelp" placeholder="Enter username..." value="<?php echo htmlentities ($username) ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"  name="password" id="password" placeholder="Password" value="<?php echo htmlentities ($password) ?>">
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" name="submit" value="submit" class="btn btn-primary btn-user btn-block">
                                    </div>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="../register.php">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="./assets/scripts/main.js"></script>
</body>
                                                                                                                                                                                                    