<?php
include 'header.php';
include 'controllers/articles-content-controller.php';
?>
<h1><?= $articleContentList->title; ?></h1>
<ul class="collection">
    <li class="collection-item avatar">
        <div class="row postInfo">
            <div class="col s12 m12 l12">
                <i class="medium material-icons  center-align">account_circle</i>
                <span class=" center-align"><?= $articleContentList->maker; ?></span>
                <span class="postDate right"><?= $articleContentList->date; ?></span>
            </div>
        </div>
    <li class="divider"></li>
    <div class="postContent">
        <li><?= $articleContentList->content ?></li>
    </div>
</li>
</ul>
<?php include 'footer.php'; ?>

