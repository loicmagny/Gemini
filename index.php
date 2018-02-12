<?php
include 'header.php';
?>
<div class = "slider fullscreen">
    <ul class = "slides">
        <li>
            <img src = "http://s1.picswalls.com/wallpapers/2014/07/28/india-wallpaper_120918984_119.jpg"> <!--random image -->
            <div class = "caption center-align">
                <div class = "section white">
                    <div class = "row container">
                        <h1 class = "black-text display-3">Bienvenue</h1>
                        <p class = "grey-text text-darken-3 lighten-3">Ceci est un message de bienvenue.</p>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <img src = "https://static.giantbomb.com/uploads/original/10/109663/1885158-2076161096_83c4ec17a7_o.jpg"> <!--random image -->
            <div class = "caption right-align">
                <div class = "section white">
                    <div class = "row container">
                        <h2 class = "display-3">Gemini, qu'est ce que c'est?</h2>
                        <p class = "grey-text text-darken-3 lighten-3">Apprenez à mieux connaitre vos produits.</p>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <img src = "http://www.selecttravelholidays.co.uk/application/files/3714/8501/5824/Elephant_with_backdrop_of_Kilimanjaro_in_Amboseli_National_Park_Kenya.jpg"> <!--random image -->
            <div class = "caption left-align">
                <div class = "section white">
                    <div class = "row container">
                        <h2 class = "display-3">Gemini, comment ça marche?</h2>
                        <p class = "grey-text text-darken-3 lighten-3">Achetez. Cherchez. Découvrez.</p>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>
<?php
include 'footer.php';
if (isset($_POST['deconnect'])) {
    session_unset();
    session_destroy();
} else {
    session_write_close();
}
?>
