//Au clic de l'utilisateur,
$('#send').click(function () {
    //On crée la variable à laquelle on lie la valeur de l'input du même nom
    var post = $('#post').val();
    //On crée la variable à laquelle on lie la valeur de l'input du même nom
    var id_user = $('#id_user').val();
    //On crée la variable à laquelle on lie la valeur de l'input du même nom
    var id_topic = $('#id_topic').val();
    //On crée la variable à laquelle on lie la valeur de l'input du même nom
    var date = $('#date').val();
    //On crée la variable à laquelle on lie la valeur de l'input du même nom
    var id_author = $('#id_author').val();
    //On crée la variable à laquelle on lie la valeur de l'input du même nom
    $.post(//Le fichier appelé lors de l'appel ajax
            '../../controllers/post-controller.php', {
                //Les différentes valeurs qui transitent par ajax
                send: 'Poster',
                post: post,
                id_topic: id_topic,
                id_user: id_user,
                date: date,
                ajax: 'test'});
    //Une fois l'appel ajax terminé on créé la variable display qui permet d'afficher instantanément le commentaire entré par l'utilisateur
    var display = '<ul class="collection">'
            + '<li class="collection-item avatar post">'
            + '<div class="row ">'
            + '<div class="postInfo">'
            + ' <div class="col s6 m2 l2">'
            + '<span class="postDate">' + date + '</span>'
            + ' </div>'
            + ' <a href="user-profile.php?user=' + id_author + '"class="postMaker">' + id_user + '</a>'
            + '</div>'
            + ' </div>'
            + '</li>'
            + '<li class="divider"></li>'
            + '<li class="postContent">' + post + '</li>'
            + '</ul>'
    //On affiche la variable display
    $('#posts').append(display);
});
