<?php
include 'header.php';
include 'controllers/administration-controller.php';
?>
<div class="section white container formOptions">
    <?php if ($_SESSION['role'] == NULL || $_SESSION['role'] != 1) { ?>
        <p>Cette page est reservée aux administrateurs, sans les droits adequats vous ne pouvez pas accéder à cette page</p>
    <?php } else { ?>
        <h1>Création des rôles d'administration</h1>
        <form action="#" method="POST">
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="createRole" required class="validate">
                    <label for="createRole">Créer un rôle</label>
                </div>
            </div>
            <input type="submit" name="create" class="btn hoverable green black-text" value="Créer" />
        </form>
        <h2>Accorder un rôle</h2>
        <form action="#" method="POST">
            <div class="row">
                <div class="input-field col s12">
                    <select name="roleSelect" multiple>
                        <option value="" disabled selected>Choisir un rôle</option>
                        <?php foreach ($roleList as $roleNumber) { ?>
                            <option value="<?= $roleNumber->id ?>"><?= $roleNumber->role; ?></option>
                        <?php } ?>
                    </select>
                    <label>Rôle d'administraton</label>
                </div>
                <div class="input-field col s12">
                    <select name="userSelect" multiple>
                        <option value="" disabled selected>Choisir un utilisateur</option>
                        <?php foreach ($userList as $userNumber) { ?>
                            <option value="<?= $userNumber->id ?>"><?= $userNumber->login; ?></option>
                        <?php } ?>
                    </select>
                    <label>Nom d'utilisateur</label>
                </div>
            </div>
            <input type="submit" name="grant" class="btn hoverable green black-text" value="Accorder statut" />
            <input type="submit" name="remove" class="btn hoverable red black-text" value="Retirer statut" />
        </form>
    </div>
<?php } include 'footer.php'; ?>
