<?php
include 'header.php';
?>
<div class="section white container formOptions">
    <div class="row">
        <ul class="tabs">
            <li class="tab col s4"><a href="#topic">Topics</a></li>
            <li class="tab col s4"><a href="#articles">Articles</a></li>
            <li class="tab col s4"><a href="#advices">Conseils</a></li>
        </ul>
        <form action="#" method="post">
            <button type="submit" class="btn-flat tooltipped waves-effect waves-light right clear" name="clear" data-position="bottom" data-delay="50" data-tooltip="Nettoyer l'historique"><i class="material-icons">loop</i></button>
            <input type="text" name="user_id" id="user_id" hidden value="<?= $_SESSION['id'] ?>" />
        </form>
        <div id="topic">
            <ul class="list-group list-group-flush">

                <?php foreach ($historicList as $historic) { ?>
                    <li class="list-group-item"><a href="topic.php?page=1&topic=<?= $historic->id_topic; ?>&name=<?= $historic->topic; ?>"><?= $historic->topic; ?></a></li>
                <?php } ?>
            </ul>
        </div>
        <div id="articles">
            <ul class="list-group list-group-flush">
                <?php foreach ($historicList as $historic) { ?>
                    <li class="list-group-item"><a href="articles-content.php?article=<?= $historic->id_articles; ?>"><?= $historic->article_title; ?></a></li>
                <?php } ?>
            </ul>
        </div>
        <div id="advices">
            <ul class="list-group list-group-flush">
                <?php foreach ($historicList as $historic) { ?>
                    <li class="list-group-item"><a href="advice-content.php?advice=<?= $historic->id_advice ?>"><?= $historic->advices_title; ?></a></li>
                    <?php } ?>
            </ul>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>