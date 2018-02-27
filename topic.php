<?php
include 'header.php';
include 'controllers/post-controller.php';
?>
<div class="section white black-text">
    <h1><?= $_GET['name'] ?></h1>
    <div class="row">
        <div id="posts">
            <?php foreach ($postListPage as $posts) {
                ?>
                <ul class="collection">
                    <li class="collection-item avatar post">
                        <div class="row">
                            <div class="col s12 m6">
                                <div class="postInfo">
                                    <i class="medium material-icons postMaker">account_circle</i>
                                    <span class="postMaker"><?= $posts->postmaker ?></span>
                                </div>
                                <div class="col s12 offset-s12 m12 offset-m12">
                                    <span class="postDate"><?= $posts->date; ?></span>
                                </div>
                            </div>
                        </div>
                    <li class="divider"></li>
                    <li class="postContent"><?= $posts->post; ?></li>
                </ul>
            <?php } ?>
        </div>
    </div>
    <?php if (isset($_SESSION['connect'])) { ?>
        <form class="col s12" method="POST" action="#">
            <div class="row">
                <div class="input-field col s12">
                    <input type="date" hidden class="form-control" name="date"  id="date" value="<?= date('Y-m-d'); ?>" />
                    <input type="text" hidden class="form-control" name="topicid"  id="topicid" value="<?= $_GET['topic'] ?>" />
                    <input type="text" hidden class="form-control" name="postmaker"  id="postmaker" value="<?= $_SESSION['login'] ?>" />
                    <textarea id="post" class="materialize-textarea" name="post" data-length="300"></textarea>
                    <label for="textarea1">Contenu</label>
                    <a id="send" onclick="Materialize.toast('Message posté', 2000)" class="btn btn-flat">send</a>
                </div>
            </div>
        </form>
        <div id="result"></div>
    <?php } ?>
    <a class="btn-flat" href="=topic.php?page=<?= $page - 1 ?>&topic=<?= $_GET['topic'] ?>&name=<?= $_GET['name'] ?>" <?= $start <= 1 ? 'disabled' : '' ?>>Précédente</a>
    <?php
    for ($pageNumber = 1; $pageNumber <= $maxPagination; $pageNumber++) {
        ?>   <a href="topic.php?page=<?= $pageNumber ?>&topic=<?= $_GET['topic'] ?>&name=<?= $_GET['name'] ?>" class="btn-flat" <?= $page == $pageNumber ? 'disabled' : '' ?>><?= $pageNumber ?></a>
    <?php } ?>
    <a class="btn-flat" href="topic.php?page=<?= $page + 1 ?>&topic=<?= $_GET['topic'] ?>&name=<?= $_GET['name'] ?>" <?= $start >= $maxPagination ? 'disabled' : '' ?>>Suivante</a>
</div>
<?php
include 'footer.php';
?>
