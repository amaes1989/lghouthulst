<?php
include ("includes/header.php");
if (!$session->is_signed_in ()) {
    redirect ( 'login.php' );
}
$event = new Event();
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
        $event->save();

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
                        <input type="text" readonly name="id" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Naam</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="date">Datum</label>
                        <input type="date" name="date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="uur">Uur</label>
                        <input type="time" name="uur" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="start_inschrijving">Start inschrijving</label>
                        <input type="date" name="start_inschrijving" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="stop_inschrijving">Stop inschrijving</label>
                        <input type="date" name="stop_inschrijving" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="locatie">Locatie</label>
                        <select name="locatie">
                            <option value="leeg">-- Selecteer een plaats --</option>
                            <?php
                                foreach ($plaatsen as $plaats){
                                    echo "<option value=" . $plaats->id . ">". $plaats->name . "</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="wie">Voor wie?</label>
                        <select name="wie">
                            <option value="leeg">-- Selecteer --</option>
                            <option value="Leden">Leden</option>
                            <option value="Iedereen">Iedereen</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="aantal_aanwezigen">Aantal aanwezigen</label>
                        <input type="number" name="aantal_aanwezigen">
                    </div>
                    <div class="form-group">
                        <label for="uitleg">Uitleg evenement</label>
                        <textarea name="uitleg" id="editor">

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
                    <!-- <div class="form-group">
                        <label for="verslag">Verslag</label>
                        <input type="file" name="verslag" class="form-control">
                    </div>-->


                    <input type="submit" name="submit" value="Voeg evenement toe" class="btn btn-primary">

                </div>
            </div>
        </form>
    </div>
</div>

<?php
include ("includes/footer.php");
?>
                                                                                                                                                                                                                                                               