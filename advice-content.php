<?php
include 'header.php';
include 'controllers/tips-content-controller.php'
?>
<div class="section white container formOptions">
    <div class="row ">
        <div class="postInfo">
            <div class="col s6 m2 l2">
                <span class="postDate"><?= $tipsContent->DATE; ?></span>
            </div>
            <?php if (($tipsContent->profilePic) != null) { ?>
                <img src="<?= $tipsContent->profilePic ?>" alt="photo de profil" id="profilePic"/>
            <?php } else { ?>
                <i class="medium material-icons postMaker">account_circle</i>
            <?php } ?>
            <a href="user-profile.php?user=<?= $tipsContent->id_author; ?>" class="postMaker"><?= $tipsContent->login ?></a>
            <p><?= $tipsContent->title; ?></p>
        </div>
    </div>
    <p class="divider"></p>
    <p><?= $tipsContent->content; ?></p>
</div>
<?php
include 'footer.php';
?>
