<?php
include 'header.php';
include 'controllers/post-controller.php';
?>
<section class="section white black-text container formOptions">
    <h1><?= $_GET['name'] ?></h1>
    <div class="row">
        <div id="posts">
            <?php if ($getPosts) { ?>
                <?php foreach ($postListPage as $posts) {
                    ?>
                    <ul class="collection">
                        <li class="collection-item avatar post">
                            <div class="row ">
                                <div class="postInfo">
                                    <div class="col s6 m2 l2">
                                        <span class="postDate"><?= $posts->DATE; ?></span>
                                    </div>
                                    <?php if (($posts->profilePic) != null) { ?>
                                        <img src="<?= $posts->profilePic ?>" alt="photo de profil" id="profilePic"/>
                                    <?php } else { ?>
                                        <i class="medium material-icons postMaker">account_circle</i>
                                    <?php } ?>
                                    <a href="user-profile.php?user=<?= $posts->id_user; ?>"class="postMaker"><?= $posts->login ?></a>
                                </div>
                            </div>
                            <div class="row">
                                <?php if ($_SESSION['role'] == 1 || $_SESSION['role'] == 2 || $_SESSION['id'] == $posts->id_user) { ?>
                                    <div class="col s12 m12 l12">
                                        <form action="#" method="POST">
                                            <button type="submit" name="updatePost" class="btn-flat tooltipped waves" data-position="left" data-delay="50" data-tooltip="Modifier le commentaire" ><i class="material-icons">create</i></button>
                                        </form>
                                        <form action="#" method="POST">
                                            <input hidden value="<?= $posts->id; ?>" id="disabled" name="id" type="text" class="validate">
                                            <input hidden value="<?= $posts->id_user; ?>" id="disabled" name="id_user" type="text" class="validate">
                                            <input hidden value="<?= $posts->id_topic; ?>" id="disabled" name="id_topic" type="text" class="validate">
                                            <button type="submit" name="deletePost" class="btn-flat tooltipped waves" data-position="right" data-delay="50" data-tooltip="Supprimer le commentaire" ><i class="material-icons">delete_forever</i></button>
                                        </form>
                                    </div>
                                <?php } ?>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li class="postContent">
                            <div class="row">

                                <div class="input-field col s12">
                                    <?php if (isset($_POST['updatePost'])) { ?>
                                        <form action="#" method="POST">
                                            <input hidden value="<?= $posts->id; ?>" id="disabled" name="id" type="text" class="validate">
                                            <input hidden value="<?= $posts->id_user; ?>" id="disabled" name="id_user" type="text" class="validate">
                                            <input hidden value="<?= $posts->id_topic; ?>" id="disabled" name="id_topic" type="text" class="validate">
                                            <input value="<?= $posts->post; ?>" name="newPost" type="text" class="validate">
                                            <button type="submit" name="validateUpdate" class="btn blue waves" >Modifier</button>
                                        </form>
                                    <?php } else { ?>
                                        <input disabled value="<?= $posts->post; ?>" id="disabled" name="newPost" type="text" class="validate">
                                    <?php } ?>
                                </div>
                            </div>
                        </li>
                    </ul>
                <?php } ?>
            </div>
        </div>
        <?php
    } else {
        ?>
        <p>Il n'y a rien ici</p>
        <?php
    }
    ?>
    <?php if (isset($_SESSION['connect'])) { ?>
        <form method="POST" action="#" enctype="multipart/form-data">
            <div class="row">
                <div class="input-field col s12 ">
                    <input type="datetime" hidden class="form-control " name="date"  id="date" value="<?= date('Y-m-d H:i'); ?>" />
                    <input type="text" hidden class="form-control " name="id_user"  id="id_user" value="<?= $_SESSION['id']; ?>" />
                    <input type="text" hidden class="form-control " name="id_topic"  id="id_topic" value="<?= $_GET['topic']; ?>" />
                    <textarea id="post" class="materialize-textarea " name="post" data-length="300"></textarea>
                    <label for="textarea1">Contenu</label>
                    <a id="send" onclick="Materialize.toast('Message posté', 2000)" class="btn btn-flat">Publier</a>
                </div>
            </div>
        </form>
        <?php
    }
    ?>
    <div id = "result"></div>
    <ul class = "pagination">
        <li class="waves-effect"><a class="btn-flat" href="topic.php?page=<?= $page - 1 ?>&topic=<?= $_GET['topic'] ?>&name=<?= $_GET['name'] ?>" <?= $start <= 1 ? 'disabled' : '' ?>>Précédente</a></li>
        <?php
        for ($pageNumber = 1; $pageNumber <= $maxPagination; $pageNumber++) {
            ?>   <li class="waves-effect"><a href="topic.php?page=<?= $pageNumber ?>&topic=<?= $_GET['topic'] ?>&name=<?= $_GET['name'] ?>" class="btn-flat" ><?= $pageNumber ?></a></li>
            <?php } ?>
        <li class="waves-effect"><a class="btn-flat" href="topic.php?page=<?= $page + 1 ?>&topic=<?= $_GET['topic'] ?>&name=<?= $_GET['name'] ?>" <?= $page >= $maxPagination ? 'disabled' : '' ?>>Suivante</a></li>
    </ul>
</section>
<?php
include 'footer.php';
?>
