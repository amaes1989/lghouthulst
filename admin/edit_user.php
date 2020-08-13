<?php
include ("includes/header.php");
if (!$session->is_signed_in ()) {
    redirect ( 'login.php' );
}

if(empty($_GET['id'])){
    redirect ('users.php');
}

$user = User::find_by_id ($_GET['id']);
//var_dump ($user);

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
        $user->functie = $_POST['functie'];
        $user->set_file($_FILES['user_image']);
        $user->save_user_and_image();

        if(empty($_FILES['user_image'])){
            $user->save();
        }else{
            $user->set_file($_FILES['user_image']);
            $user->save_user_and_image();
            $user->save();
            redirect ("edit_user.php?id={$user->id}");
        }
        redirect ('users.php');
    }
}
include ("includes/sidebar.php");
include ("includes/content-top.php");
?>

<div class="row">
    <div class="col-12">
        <h1>Edit user</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" readonly name="id" class="form-control" value="<?php echo $user->id; ?>">
                    </div>
                    <div class="form-group">
                        <label for="username">Gebruikersnaam</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>">
                    </div>
                    <div class="form-group">
                        <label for="first name">Voornaam</label>
                        <input type="text" name="first_name" class="form-control" value="<?php echo $user->first_name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="last name">Familienaam</label>
                        <input type="text" name="last_name" class="form-control" value="<?php echo $user->last_name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $user->email; ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Paswoord</label>
                        <input type="password" name="password" class="form-control" value="<?php echo $user->password; ?>">
                    </div>
                    <div class="form-group">
                        <label for="street">Straat</label>
                        <input type="text" name="street" class="form-control" value="<?php echo $user->street; ?>">
                    </div>
                    <div class="form-group">
                        <label for="number">Huisnummer</label>
                        <input type="text" name="number" class="form-control" value="<?php echo $user->number; ?>">
                    </div>
                    <div class="form-group">
                        <label for="zip">Postcode</label>
                        <input type="text" name="zip" class="form-control" value="<?php echo $user->zip; ?>">
                    </div>
                    <div class="form-group">
                        <label for="city">Gemeente</label>
                        <input type="text" name="city" class="form-control" value="<?php echo $user->city; ?>">
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefoon</label>
                        <input type="tel" name="phone" class="form-control" value="<?php echo $user->phone; ?>">
                    </div>
                    <div class="form-group">
                        <label for="functie">Functie</label>
                        <select name="functie" ><?php
                        switch ($user->functie){
                            case 1:
                                echo "<option value=1 selected='seleted'>Voorzitter</option>";
                                echo "<option value=2 >Ondervoorzitter</option>";
                                echo "<option value=3 >Penningmeester</option>";
                                echo "<option value=4 >Secretaris + Fotograaf</option>";
                                echo "<option value=5 >website + uitnodigingen</option>";
                                echo "<option value=6 >Bestuurslid</option>";
                                echo "<option value=7 >Lid</option>";
                                echo "<option value=8 >Geen lid</option>";
                                break;
                            case 2:
                                echo "<option value=1 >Voorzitter</option>";
                                echo "<option value=2 selected='seleted'>Ondervoorzitter</option>";
                                echo "<option value=3 >Penningmeester</option>";
                                echo "<option value=4 >Secretaris + Fotograaf</option>";
                                echo "<option value=5 >website + uitnodigingen</option>";
                                echo "<option value=6 >Bestuurslid</option>";
                                echo "<option value=7 >Lid</option>";
                                echo "<option value=8 >Geen lid</option>";
                                break;
                            case 3:
                                echo "<option value=1 >Voorzitter</option>";
                                echo "<option value=2 >Ondervoorzitter</option>";
                                echo "<option value=3 selected='seleted'>Penningmeester</option>";
                                echo "<option value=4 >Secretaris + Fotograaf</option>";
                                echo "<option value=5 >website + uitnodigingen</option>";
                                echo "<option value=6 >Bestuurslid</option>";
                                echo "<option value=7 >Lid</option>";
                                echo "<option value=8 >Geen lid</option>";
                                break;
                            case 4:
                                echo "<option value=1 >Voorzitter</option>";
                                echo "<option value=2 >Ondervoorzitter</option>";
                                echo "<option value=3 >Penningmeester</option>";
                                echo "<option value=4 selected='seleted'>Secretaris + Fotograaf</option>";
                                echo "<option value=5 >website + uitnodigingen</option>";
                                echo "<option value=6 >Bestuurslid</option>";
                                echo "<option value=7 >Lid</option>";
                                echo "<option value=8 >Geen lid</option>";
                                break;
                            case 5:
                                echo "<option value=1 >Voorzitter</option>";
                                echo "<option value=2 >Ondervoorzitter</option>";
                                echo "<option value=3 >Penningmeester</option>";
                                echo "<option value=4 >Secretaris + Fotograaf</option>";
                                echo "<option value=5 selected='seleted'>website + uitnodigingen</option>";
                                echo "<option value=6 >Bestuurslid</option>";
                                echo "<option value=7 >Lid</option>";
                                echo "<option value=8 >Geen lid</option>";
                                break;
                            case 6:
                                echo "<option value=1 >Voorzitter</option>";
                                echo "<option value=2 >Ondervoorzitter</option>";
                                echo "<option value=3 >Penningmeester</option>";
                                echo "<option value=4 >Secretaris + Fotograaf</option>";
                                echo "<option value=5 >website + uitnodigingen</option>";
                                echo "<option value=6 selected='seleted'>Bestuurslid</option>";
                                echo "<option value=7 >Lid</option>";
                                echo "<option value=8 >Geen lid</option>";
                                break;
                            case 7:
                                echo "<option value=1 >Voorzitter</option>";
                                echo "<option value=2 >Ondervoorzitter</option>";
                                echo "<option value=3 >Penningmeester</option>";
                                echo "<option value=4 >Secretaris + Fotograaf</option>";
                                echo "<option value=5 >website + uitnodigingen</option>";
                                echo "<option value=6 >Bestuurslid</option>";
                                echo "<option value=7 selected='seleted'>Lid</option>";
                                echo "<option value=8 >Geen lid</option>";
                            case 8:
                                echo "<option value=1 >Voorzitter</option>";
                                echo "<option value=2 >Ondervoorzitter</option>";
                                echo "<option value=3 >Penningmeester</option>";
                                echo "<option value=4 >Secretaris + Fotograaf</option>";
                                echo "<option value=5 >website + uitnodigingen</option>";
                                echo "<option value=6 >Bestuurslid</option>";
                                echo "<option value=7 >Lid</option>";
                                echo "<option value=8 selected='seleted'>Geen lid</option>";
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <img src="<?php echo $user->image_path_and_placeholder(); ?>" alt="" class="img-fluid" width="40" height="40">
                        <label for="file">User image</label>
                        <input type="file" name="user_image" class="form-control">
                    </div>
                    <input type="submit" name="submit" value="Update User" class="btn btn-primary">
                    <a href="delete_user.php?id=<?php echo $user->id; ?>" class="btn btn-danger">
                        Delete User
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
include ("includes/footer.php");
?>
