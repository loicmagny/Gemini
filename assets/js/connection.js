$(document).ready(function () {
    $('#connect').click(function (e) {
        e.preventDefault();
        $.post(
                'controllers/connection-controller.php',
                {
                    connect: 'Valider',
                    login: $('#login').val(),
                    password: $('#password').val(),
                    ajax: 'test'
                },
                function (data) {
                    if (data === 'Success') {
                        $('#resultat').html('<p>Vous avez été connecté avec succès !</p>');
                    } else {
                        // Le membre n'a pas été connecté. (data vaut ici 'failed')
                        $('#resultat').html('<p>Erreur pendant la connexion...</p>');
                    }
                },
                'text'
                );
    });
});
