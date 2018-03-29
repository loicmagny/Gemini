</div>
<?php if (isset($_SESSION['connect'])) { ?>
    <footer class="page-footer <?= $_SESSION['colorNav'] ?>">
    <?php } else { ?>
        <footer class="page-footer">
        <?php } ?>
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Footer Content</h5>
                    <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Liens utiles</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="contact.php">Contact</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">FAQ</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Conditions d'utilisation</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="assets/libs/materialize/dist/js/materialize.min.js"></script>
    <script src="assets/js/materializeDOMElements.js"></script>
    <script src="assets/js/post.js"></script>
    <script src="assets/js/checkUnique.js"></script>
    <script src="assets/js/search-settings.js"></script>
</body>
</html>