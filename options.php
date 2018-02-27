<?php
include 'header.php';
?>
<div class="jumbotron">
    <h2>Options</h2>

</div>
<?php
include 'footer.php';

if (isset($_POST['deconnect'])) {
    session_unset();
    session_destroy();
} else {
    session_write_close();
}
?>

