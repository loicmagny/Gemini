<?php
if (isset($_POST['submit']) || isset($_POST['connect'])) {
    $_SESSION['submit'] = $_POST['submit'];
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['mail'] = $_POST['mail'];
    $_SESSION['age'] = $_POST['age'];
    $_SESSION['profilePic'] = $_POST['profilePic'];
}
include 'header.php';
?>
<div class="jumbotron">
    <h2>Articles</h2>
    <table class="table table-striped table-hover ">
        <thead>
            <tr>
                <th>Nom de l'article</th>
                <th>Créateur</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <tr class="success">
                <td>Article 1</td>
                <td>admin</td>
                <td>08/12/2017</td>
            </tr>
            <tr class="danger">
                <td>Article 2</td>
                <td>admin</td>
                <td>08/12/2017</td>
            </tr>
            <tr class="warning">
                <td>Article 3</td>
                <td>admin</td>
                <td>08/12/2017</td>
            </tr>
            <tr class="active">
                <td>Article 4</td>
                <td>admin</td>
                <td>08/12/2017</td>
            </tr>
        </tbody>
    </table>
</div>
<?php
include 'footer.php'
?>
