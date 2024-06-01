<!DOCTYPE html>
<html lang="cs-cz">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="martinHeiler">
        <meta name="description" content="čalounictví Michal Heiler">
        <meta name="keywords" content="čalounictví, oprava nábytku, přečalounění">
        <link rel="shortcut icon" href="obrazky/sofaico.ico">
        <link rel="stylesheet" href="styl.css" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="css/lightbox.css" type="text/css"/>
        <script src="js/jquery-1.7.2.min.js"></script>
        <script src="js/jquery-ui-1.8.18.custom.min.js"></script>
        <script src="js/jquery.smooth-scroll.min.js"></script>
        <script src="js/lightbox.js"></script>
        <title>Čalounictví Michal Heiler</title>
    </head>
    <body>
        <header>
            
            <div class="company">   
                <h1><img class="logo" src="obrazky/logoCalounictvi.png" alt="logo">
                    ČALOUNICTVÍ<br/><small>Michal Heiler</small></h1>
                
                    <div class="container-contact">
                        <a href="https://www.facebook.com/profile.php?id=100089204494468" target="_blank"><i class="fa-brands fa-square-facebook" style="color: #326dd2;"></i></a>            
                        <i class="fa-solid fa-phone-volume"></i>
                        <span>+420 605 265 293</span>
                    </div>
            </div>
            <!--<button class="toggle-btn"><i class="fas fa-bars"></i></button> ready for responsive web -->
        </header>
    <nav class="navbar">
        <ul>
            <li><a href="index.php">Úvodní&nbsp;stránka</a></li>
            <li><a href="galerie.php">Galerie</a></li>
            <li class="active"><a href="vzorníky.php">Vzorníky&nbsp;látek</a></li>
            <li><a href="poptavka.php">Nezávazná&nbsp;poptávka</a></li>
            <li><a href="kontakt.php">Kontakt</a></li>
        </ul>
    </nav>

    <?php
	require_once('tridy/Gallery.php');

	$galerie = new Galerie('vzorniky', 5);
	$galerie->nacti();
	$galerie->vypis();

	?>

    <footer>
        &copy; čalounictví Michal Heiler
    </footer>
    <!--<script>
        document.querySelector('.toggle-btn').addEventListener('click', function() {
        document.querySelector('.navbar').classList.toggle('active');
        });
    </script> ready for responsive web-->
</body>
</html>