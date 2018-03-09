<?php
include 'header.php';
include 'controllers/advice-content-controller.php'
?>
<div class="section white container formOptions">
    <div class="row ">
        <div class="postInfo">
            <div class="col s6 m2 l2">
                <span class="postDate"><?= $adviceContent->date; ?></span>
            </div>
            <?php if (($adviceContent->authorPic) != null) { ?>
                <img src="<?= $adviceContent->authorPic ?>" alt="photo de profil" id="profilePic"/>
            <?php } else { ?>
                <i class="medium material-icons postMaker">account_circle</i>
            <?php } ?>
            <a href="user-profile.php?user=<?= $adviceContent->id_author; ?>" class="postMaker"><?= $adviceContent->author ?></a>
            <p><?= $adviceContent->title; ?></p>
        </div>
    </div>
    <p class="divider"></p>
    <p><?= $adviceContent->content; ?></p>
</div>
<?php
include 'footer.php';
?>
