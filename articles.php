<?php
include 'header.php';
include 'controllers/article-controller.php';
?>
<div class="section white container formOptions">
    <h2>Articles</h2>
    <table class="table table-striped table-hover center tableCommunity responsive">
        <thead>
            <tr>
                <th>Nom de l'article</th>
                <th>Créateur</th>
                <th>Date</th>
                <th><a class="btn tooltipped btn-flat" data-position="bottom" data-delay="50" data-tooltip="Ajouter un article" href="add-article.php"><i class="material-icons">add_circle</i></a></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($articleList as $article) {
                ?>  <tr class="success center tableCommunity">
                    <td><a href="articles-content.php?article=<?= $article->id; ?>"><?= $article->title; ?></a></td>
                    <td><?= $article->login; ?></td>
                    <td><?= $article->DATE; ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
<?php
include 'footer.php'
?>
