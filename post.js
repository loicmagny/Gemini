    $('#send').click(function () {
        var post = $('#post').val();
        var postmaker = $('#postmaker').val();
        var topicid = $('#topicid').val();
        var date = $('#date').val();
        $.post("controllers/post-controller.php", {
            send: 'Poster',
            post: post,
            postmaker: postmaker,
            topicid: topicid,
            date: date,
            ajax: 'test'});
        var display = '<ul class="collection">'
                + '<li class="collection-item avatar post">'
                + '<div class="row">'
                + '<div class="col s12 m6">'
                + '<div class="postInfo">'
                + '<i class="medium material-icons postMaker">account_circle</i>'
                + '<span class="postMaker">' + postmaker + '</span>'
                + '</div>'
                + '<div class="col s12 offset-s12 m12 offset-m12">'
                + '<span class="postDate"' + date + '</span>'
                + '</div>'
                + '</div>'
                + '<li class="divider"></li>'
                + '<li class="postContent">' + post + '</li>';
        $('#posts').append(display);
    });
