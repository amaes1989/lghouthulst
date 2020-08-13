<?php
include ("includes/header.php");
if (!$session->is_signed_in ()) {
    redirect ( 'login.php' );
}
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
        $user->set_file($_FILES['user_image']);
        $user->save_user_and_image();
        /*$user->save ();*/
        redirect ('users.php');
    }
}
include ("includes/sidebar.php");
include ("includes/content-top.php");
?>

<div class="row">
    <div class="col-12">
        <h1>Add user</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="first name">First Name</label>
                        <input type="text" name="first_name" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="last name">Last Name</label>
                        <input type="text" name="last_name" class="form-control" ">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" ">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
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
                        <label for="functie">Functie</label>
                        <select name="functie" ><?php
                                    echo "<option value=1 >Voorzitter</option>";
                                    echo "<option value=2 >Ondervoorzitter</option>";
                                    echo "<option value=3 >Penningmeester</option>";
                                    echo "<option value=4 >Secretaris + Fotograaf</option>";
                                    echo "<option value=5 >website + uitnodigingen</option>";
                                    echo "<option value=6 >Bestuurslid</option>";
                                    echo "<option value=7 selected='selected'>Lid</option>";
                                    echo "<option value=8 >Geen lid</option>";
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <img src="<?php echo $user->image_path_and_placeholder(); ?>" alt="" class="img-fluid" width="40" height="40">
                        <label for="file">User image</label>
                        <input type="file" name="user_image" class="form-control">
                    </div>
                    <input type="submit" name="submit" value="Add User" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
</div>

<?php
include ("includes/footer.php");
?>
