<?php
include 'header.php';
include 'controllers/post-controller.php';
var_dump($_SESSION);
?>
<div class="section white black-text container formOptions">
    <h1><?= $_GET['name'] ?></h1>
    <div class="row">
        <div id="posts">
            <?php foreach ($postListPage as $posts) {
                ?>
                <ul class="collection">
                    <li class="collection-item avatar post">
                        <div class="row ">
                            <div class="postInfo">
                                <div class="col s6 m2 l2">
                                    <span class="postDate"><?= $posts->date; ?></span>
                                </div>
                                <?php if (($posts->authorPic) != null) { ?>
                                    <img src="<?= $posts->authorPic ?>" alt="photo de profil" id="profilePic"/>
                                <?php } else { ?>
                                    <i class="medium material-icons postMaker">account_circle</i>
                                <?php } ?>
                                <a href="user-profile.php?user=<?= $posts->id_author; ?>"class="postMaker"><?= $posts->postmaker ?></a>
                            </div>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li class="postContent"><?= $posts->post; ?></li>
                </ul>
            <?php } ?>
        </div>
    </div>
    <?php if (isset($_SESSION['connect'])) { ?>
        <form method="POST" action="#" enctype="multipart/form-data">
            <div class="row">
                <div class="input-field col s12 ">
                    <input type="date" hidden class="form-control " name="date"  id="date" value="<?= date('Y-m-d'); ?>" />
                    <input type="text" hidden class="form-control " name="id_author"  id="id_author" value="<?= $_SESSION['id'] ?>" />
                    <input type="text" hidden class="form-control " name="topicid"  id="topicid" value="<?= $_GET['topic'] ?>" />
                    <input type="text" hidden class="form-control " name="postmaker"  id="postmaker" value="<?= $_SESSION['login'] ?>" />
                    <input type="text" hidden class="form-control" name="authorPic" id="authorPic" value="<?= $_SESSION['profilePic']; ?>" />
                    <textarea id="post" class="materialize-textarea " name="post" data-length="300"></textarea>
                    <label for="textarea1">Contenu</label>
                    <a id="send" onclick="Materialize.toast('Message posté', 2000)" class="btn btn-flat">Publier</a>
                </div>
            </div>
        </form>
        <div id="result"></div>
        <ul class="pagination">
        <?php } ?>
        <li class="waves-effect"><a class="btn-flat" href="topic.php?page=<?= $page - 1 ?>&topic=<?= $_GET['topic'] ?>&name=<?= $_GET['name'] ?>" <?= $start <= 1 ? 'disabled' : '' ?>>Précédente</a></li>
        <?php
        for ($pageNumber = 1; $pageNumber <= $maxPagination; $pageNumber++) {
            ?>   <li class="waves-effect"><a href="topic.php?page=<?= $pageNumber ?>&topic=<?= $_GET['topic'] ?>&name=<?= $_GET['name'] ?>" class="btn-flat" <?= $page == $pageNumber ? 'disabled' : '' ?>><?= $pageNumber ?></a></li>
            <?php } ?>
        <li class="waves-effect"><a class="btn-flat" href="topic.php?page=<?= $page + 1 ?>&topic=<?= $_GET['topic'] ?>&name=<?= $_GET['name'] ?>" <?= $start >= $maxPagination ? 'disabled' : '' ?>>Suivante</a></li>
    </ul>
</div>
<?php
include 'footer.php';
?>
