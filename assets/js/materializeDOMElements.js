/*
 * Ce fichier contient toutes les fonctions relatives au framework Materialize
 */

$(document).ready(function () {
    $('.button-collapse').sideNav();
});
$(document).ready(function () {
    $('select').material_select();
});
$(document).ready(function () {
// the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
});
$(document).ready(function () {
    $('select').select();
});
$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 90, // Creates a dropdown of 15 years to control year
    labelMonthNext: 'Mois suivant',
    labelMonthPrev: 'Mois précédent',
    labelMonthSelect: 'Selectionner le mois',
    labelYearSelect: 'Selectionner une année',
    monthsFull: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
    monthsShort: ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aou', 'Sep', 'Oct', 'Nov', 'Dec'],
    weekdaysFull: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
    weekdaysShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
    weekdaysLetter: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
    today: 'Aujourd\'hui',
    clear: 'Réinitialiser',
    close: 'Fermer',
    format: 'dd/mm/yyyy'
});
$(document).ready(function () {
    $('.slider').slider();
});
$(document).ready(function () {
    $('.parallax').parallax();
});
$('.tap-target').tapTarget('open');
$('.tap-target').tapTarget('close');
$(document).ready(function () {
    $('ul.tabs').tabs();
});
$(document).ready(function () {
    $('input#input_text, textarea#textarea1').characterCounter();
});
$(document).on('click', '#toast-container .toast', function () {
    $(this).fadeOut(function () {
        $(this).remove();
    });
});