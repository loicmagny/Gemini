<?php
include 'header.php';
include 'controllers/user-profile-controller.php';
?>
<div class="section white container formOptions">
    <div class="row">
        <img src="<?= $userProfile->profilePic; ?>" alt="photo de profil" class="circle profilePic responsive-img" />
    </div>
    <div class="row">
        <p><?= $userProfile->login; ?></p>
        <p><?= $userProfile->birthdate; ?></p>
    </div>
</div>
<?php include 'footer.php'; ?>