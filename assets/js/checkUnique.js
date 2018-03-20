
function checkLoginUnique() {
    $.post(
            '../../controllers/register-controller.php',
            {
                checkLogin: $('#registerLogin').val()
            },
            function (checkLoginResult) {
                if (checkLoginResult == 1) {
                    $('#errorCheckLoginUnique').css('display', 'block');
                    var login = document.getElementById('addUser');
                    var errorMsg = 'Un compte est déjà enregistré avec ce login';
                    login[0].setCustomValidity(errorMsg);
                } else {
                    $('#errorCheckLoginUnique').css('display', 'none');
                    var login = document.getElementById('addUser');
                    var errorMsg = '';
                    login[0].setCustomValidity(errorMsg);
                }
            },
            'JSON'
            )
}
function checkMailUnique() {
    $.post(
            '../../controllers/register-controller.php',
            {
                checkMail: $('#mail').val()
            },
            function (checkMailResult) {
                if (checkMailResult == 1) {
                    $('#errorCheckMailUnique').css('display', 'block');
                    var mail = document.getElementById('addUser');
                    var errorMsg = 'Un compte est déjà enregistré avec cette adresse mail';
                    mail[4].setCustomValidity(errorMsg);
                } else {
                    $('#errorCheckMailUnique').css('display', 'none');
                    var mail = document.getElementById('addUser');
                    var errorMsg = '';
                    mail[4].setCustomValidity(errorMsg);
                }
            },
            'JSON'
            )
}
//var login = document.getElementById('addUser');
//var errorMsg = 'Un compte est déjà enregistré avec ce login';
//login[0].setCustomValidity(errorMsg);

//var mail = document.getElementById('addUser');
//var errorMsg = 'Un compte est déjà enregistré avec cette adresse mail';
//mail[4].setCustomValidity(errorMsg);