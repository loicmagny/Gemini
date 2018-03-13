$('#send').click(function () {
    var post = $('#post').val();
    var postmaker = $('#postmaker').val();
    var topicid = $('#topicid').val();
    var date = $('#date').val();
    var id_author = $('#id_author').val();
    var authorPic = $('#authorPic').val();
    $.post('../../controllers/post-controller.php', {
        send: 'Poster',
        post: post,
        postmaker: postmaker,
        topicid: topicid,
        id_author: id_author,
        date: date,
        authorPic: authorPic,
        ajax: 'test'});
    var display = '<ul class="collection">'
            + '<li class="collection-item avatar post">'
            + '<div class="row ">'
            + '<div class="postInfo">'
            + ' <div class="col s6 m2 l2">'
            + '<span class="postDate">' + date + '</span>'
            + ' </div>'
            + '     <img src="' + authorPic + '" alt="photo de profil" id="profilePic"/>'
            + ' <a href="user-profile.php?user=' + id_author + '"class="postMaker">' + postmaker + '</a>'
            + '</div>'
            + ' </div>'
            + '</li>'
            + '<li class="divider"></li>'
            + '<li class="postContent">' + post + '</li>'
            + '</ul>'
    $('#posts').append(display);
});
