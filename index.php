<?php
	session_start();
    require_once 'control/db.php';
    define( 'ROOT', dirname(__FILE__) );
    require_once '/inc/components/product.php';
    require_once  '/inc/components/product-card.php';
    require_once  '/inc/components/product-category.php';
?>

<?php
    // Define the root folder and base URL for the application
    function baseURL(){
        return sprintf(
            "%s://%s%s",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
            $_SERVER['SERVER_NAME'],
            dirname($_SERVER['REQUEST_URI'])
        );
    }

    define('BASE_URL', baseURL());
    $page = isset($_GET['page']) ? $_GET['page'] : 'ana';
    $bodyClass = 'page home page-template-default';
    $headerclass = 'v1';
	

	

?>


<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>FIRSATI YAKALA</title>

        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/animate.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/font-electro.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/owl-carousel.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/colors/pink.css" media="all" />

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,700italic,800,800italic,600italic,400italic,300italic' rel='stylesheet' type='text/css'>

        <link rel="shortcut icon" href="assets/images/fav-icon.png">
    </head>

    <body class="<?php echo $bodyClass;?>">
        <div id="page" class="hfeed site">
            <a class="skip-link screen-reader-text" href="#site-navigation">Yönlendirmeye Git</a>
            <a class="skip-link screen-reader-text" href="#content">İçeriğe Git</a>

            <?php require_once 'inc/header/top-bar.php'; ?>

            <?php require_once 'inc/header/header.php'; ?>

            <?php require_once  'pages/'.$page.'.php'; ?>

         
           

        </div><!-- #page -->

        <script type="text/javascript" src="assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="assets/js/tether.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap-hover-dropdown.min.js"></script>
        <script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="assets/js/echo.min.js"></script>
        <script type="text/javascript" src="assets/js/wow.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.easing.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.waypoints.min.js"></script>
        <script type="text/javascript" src="assets/js/electro.js"></script>


    </body>
</html>
