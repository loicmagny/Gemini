<?php

//$userName = '';
$userMail = '';
$title = '';
$content = '';
if (isset($_POST['contact'])) {
    if (isset($_POST['title'])) {
        $title = htmlspecialchars($_POST['title']);
    } else if (empty($_POST['title'])) {
        $formError['emptyTitle'] = 'Votre article n\'a pas de titre!';
    }
    if (isset($_POST['content'])) {
        $content = htmlspecialchars($_POST['content']);
    } else if (empty($_POST['content'])) {
        $formError['emptyContent'] = 'Votre article n\'a pas de contenu!';
    }
//        if (isset($_POST['author'])) {
//            $userName = htmlspecialchars($_POST['author']);
//        }
    if (isset($_POST['authorMail'])) {
        $userMail = htmlspecialchars($_POST['authorMail']);
    }
    $target = 'loicmagny60@gmail.com';
    // Mail
    $object = $title;
    $content = '
<html>
<head>
   <title>Vous vous êtes inscrit sur Gemini</title>
</head>
<body>
   <p>' . $content . '</p>
       </body>
</html>';
    $header = 'MIME-Version: 1.0' . "\r\n";
    $header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $header .= 'From:' . $userMail . ' ' . "\r\n";
//Envoi du mail
    $confirmMail = mail($target, $object, $content, $header);
    if (!$confirmMail) {
        $formError['confirmMail'] = 'Un problème est survenu lors de l\'envoi du mail, veuillez réessayer';
    }
}    