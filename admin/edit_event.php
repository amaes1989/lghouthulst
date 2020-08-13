<?php
include ("includes/header.php");
if (!$session->is_signed_in ()) {
    redirect ( 'login.php' );
}

if(empty($_GET['id'])){
    redirect ('events.php');
}
$event = Event::find_by_id ($_GET['id']);
$plaatsen = Plaats::find_all ();
if (isset( $_POST['submit'] )) {

    if ($event) {
        $event->name = $_POST['name'];
        $event->date = $_POST['date'];
        $event->uur = $_POST['uur'];
        $event->start_inschrijving = $_POST['start_inschrijving'];
        $event->stop_inschrijving = $_POST['stop_inschrijving'];
        $event->plaatsid = $_POST['locatie'];
        $event->wie = $_POST['wie'];
        $event->aantal_aanwezigen = $_POST['aantal_aanwezigen'];
        $event->uitleg_event = $_POST['uitleg'];
        //$vergadering->verslag = $_POST['verslag'];
        $event->save ();
        redirect ('events.php');

    }
}
include ("includes/sidebar.php");
include ("includes/content-top.php");
?>

<div class="row">
    <div class="col-12">
        <h1>Nieuw evenement</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" readonly name="id" class="form-control" value="<?php echo $event->id; ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Naam</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $event->name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="date">Datum</label>
                        <input type="date" name="date" class="form-control" value="<?php echo $event->date; ?>">
                    </div>
                    <div class="form-group">
                        <label for="uur">Uur</label>
                        <input type="time" name="uur" class="form-control" value="<?php echo $event->uur; ?>">
                    </div>
                    <div class="form-group">
                        <label for="start_inschrijving">Start inschrijving</label>
                        <input type="date" name="start_inschrijving" class="form-control" value="<?php echo $event->start_inschrijving; ?>">
                    </div>
                    <div class="form-group">
                        <label for="stop_inschrijving">Stop inschrijving</label>
                        <input type="date" name="stop_inschrijving" class="form-control" value="<?php echo $event->stop_inschrijving; ?>">
                    </div>
                    <div class="form-group">
                        <label for="locatie">Locatie</label>
                        <select name="locatie">
                            <?php
                            foreach ($plaatsen as $plaats){
                                if ($event->plaatsid == $plaats->id)
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
                        <label for="wie">Voor wie?</label>
                        <select name="wie">
                            <?php if($event->wie == "Leden") {
                                echo "<option value='Leden' selected='selected'>Leden</option>";
                                echo "<option value='Iedereen'>Iedereen</option>";
                            }elseif ($event->wie == "Iedereen"){
                                echo "<option value='Leden'>Leden</option>";
                                echo "<option value='Iedereen' selected='selected'>Iedereen</option>";
                            }
                                ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="aantal_aanwezigen">Aantal aanwezigen</label>
                        <input type="number" name="aantal_aanwezigen" value="<?php $event->aantal_aanwezigen; ?>">
                    </div>
                    <div class="form-group">
                        <label for="uitleg">Uitleg evenement</label>
                        <textarea name="uitleg" id="editor">
                            <?php echo $event->uitleg_event; ?>
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

                    <input type="submit" name="submit" value="Pas evenement aan" class="btn btn-primary">

                </div>
            </div>
        </form>
    </div>
</div>

<?php
include ("includes/footer.php");
?>
                                                                                                                                                                                                                                                                                                               