<?php
include 'header.php';
include 'controllers/post-controller.php';
?>
<div class="section white black-text" id="postTitle">
    <h1><?= $_GET['name'] ?></h1>
    <div class = "row">
        <div id = "posts">
            <?php
            foreach ($postList as $posts) {
                if ($posts->topicid == $_GET['topic']) {
                    ?>
                    <ul class="collection">
                        <li class="collection-item avatar">
                            <div class="row postInfo">
                                <div class="col s12 m12 l12">
                                    <i class="medium material-icons  center-align">account_circle</i>
                                    <span class=" center-align"><?= $posts->postmaker; ?></span>
                                    <span class="postDate right"><?= $posts->date; ?></span>
                                </div>
                            </div>
                        <li class="divider"></li>
                        <div class="postContent">
                            <li><?= $posts->post ?></li>
                        </div>
                        </li>
                    </ul>
                    <?php
                }
            }
            ?>
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
                        <input type="submit" name="send" id="send" onclick="Materialize.toast('Message posté', 2000)" class="btn btn-flat" value="Poster" />
                    </div>
                </div>
            </form>
            <div id="result"></div>
        </div>
    <?php } ?>
</div>
<?php
include 'footer.php';
?>
