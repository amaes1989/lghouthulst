<?php
include ("includes/header.php");
if (!$session->is_signed_in ()) {
    redirect ( 'login.php' );
}
$bericht = new Bericht();
$events = Event::find_all ();
if (isset( $_POST['submit'] )) {
    if ($bericht) {
        $bericht->eventid = $_POST['event'];
        $bericht->tekst = $_POST['bericht'];
        $bericht->weergeven = $_POST['weergeven'];

        $bericht->save ();
        redirect ('messages.php');
    }
}
include ("includes/sidebar.php");
include ("includes/content-top.php");
?>

<div class="row">
    <div class="col-12">
        <h1>Nieuw bericht</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="event">Evenement</label>
                        <select name="event">
                            <option value="leeg">-- Selecteer een evenement --</option>
                            <?php
                            foreach ($events as $event){
                                echo "<option value=" . $event->id . ">". $event->name . " op datum " . $event->date . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="bericht">Bericht</label>
                        <textarea name="bericht" id="editor">

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
                    <div class="form-group">
                        <label for="weergeven">Weergeven</label>
                        <select name="weergeven">
                            <option value="0">-- Nee --</option>
                            <option value="1">-- Ja --</option>
                        </select>
                    </div>
                    <input type="submit" name="submit" value="Voeg bericht toe" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
</div>

<?php
include ("includes/footer.php");
?>
