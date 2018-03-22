<?php
include 'header.php';
include 'controllers/articles-content-controller.php';
?>
<div class="section-white container formOptions">
    <h1><?= $articleContentList->title; ?></h1>
    <div class="row ">
        <div class="postInfo">
            <div class="col s6 m2 l2">
                <span class="postDate"><?= $articleContentList->DATE; ?></span>
            </div>
            <?php if (($articleContentList->profilePic) != null) { ?>
                <img src="<?= $articleContentList->profilePic ?>" alt="photo de profil" id="profilePic"/>
            <?php } else { ?>
                <i class="medium material-icons postMaker">account_circle</i>
            <?php } ?>
            <a href="user-profile.php?user=<?= $articleContentList->id_author; ?>" class="postMaker"><?= $articleContentList->login ?></a>
        </div>
    </div>
    <p class="divider"></p>
    <p class="postContent"><?= $articleContentList->content; ?></p>
</div>
<?php include 'footer.php'; ?>

