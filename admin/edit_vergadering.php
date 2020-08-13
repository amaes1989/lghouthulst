<?php
include ("includes/header.php");
if (!$session->is_signed_in ()) {
    redirect ( 'login.php' );
}

if(empty($_GET['id'])){
    redirect ('vergaderingen.php');
}

$vergadering = Vergadering::find_by_id ($_GET['id']);
$plaatsen = Plaats::find_all ();

if (isset( $_POST['submit'] )) {

    if ($vergadering) {
        $vergadering->name = $_POST['name'];
        $vergadering->date = $_POST['date'];
        $vergadering->plaatsid = $_POST['locatie'];
        $vergadering->verslag = $_POST['verslag'];
        $vergadering->save ();
        redirect ('vergaderingen.php');
    }
}
include ("includes/sidebar.php");
include ("includes/content-top.php");
?>

<div class="row">
    <div class="col-12">
        <h1>Edit vergadering</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" readonly name="id" class="form-control" value="<?php echo $vergadering->id; ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Naam</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $vergadering->name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="date">Datum</label>
                        <input type="date" name="date" class="form-control" value="<?php echo $vergadering->date; ?>">
                    </div>
                    <div class="form-group">
                        <label for="locatie">Locatie</label>
                        <select name="locatie">
                            <?php
                            foreach ($plaatsen as $plaats){
                                if ($vergadering->plaatsid == $plaats->id)
                                {
                                    $selected = 'selected="selected"';
                                }
                                else
                                {
                                    $selected = '';
                                }
                                echo "<option value=" . $plaats->id . " " . $selected . ">". $plaats->name . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                   <div class="form-group">
                        <label for="verslag">Verslag</label>
                       <textarea name="verslag" id="editor">
                            <?php echo $vergadering->verslag; ?>
                        </textarea>
                       <script>
                           ClassicEditor
                               .create( document.querySelector( '#editor' ), {
                                   toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
                                   heading: {
                                       options: [
                                           { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                                           { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                                           { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                                       ]
                                   }
                               } )
                               .catch( error => {
                                   console.log( error );
                               } );
                       </script>
                    </div>


                    <input type="submit" name="submit" value="Update vergadering" class="btn btn-primary">
                    <a href="delete_vergadering.php?id=<?php echo $vergadering->id; ?>" class="btn btn-danger">
                        Delete Vergadering
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
include ("includes/footer.php");
?>