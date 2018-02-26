<?php
include 'header.php';
include 'controllers/advice-content-controller.php'
?>
<div class="section white">
    <?php foreach ($adviceContent as $content) { ?>
        <div class="row">
            <div class="col s12 m12">
                <div class="card blue-grey darken-1 center">
                    <div class="card-content white-text">
                        <span class="card-title"><?= $content->loginAuthor; ?></span>
                        <span class="card-title"><?= $content->title . ' écrit le ' . $content->date; ?></span>
                        <p><?= $content->content; ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php
include 'footer.php';
?>
