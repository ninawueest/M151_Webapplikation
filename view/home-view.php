<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require_once "../php/db_connection.php"; ?>
    <?php require_once "../php/functions.php"; ?>
    <script language="javascript" type="text/javascript" src="../js/googlemaps.js"></script>

</head>

<body>

    <!---navbar--->
    <nav class="navbar navbar-dark bg-dark">
        <!-- Navbar content -->
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Modul 151 Web-Application</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <!---logout link--->
                <li><a href="../php/logout.php" style="color:white">Logout</a></li>
            </ul>
        </div>
    </nav>

    <!---main content--->
    <span class="title display-1">
            <!--return the username session-->
            <?php return_username(); ?>
    </span>

    <!---google maps js api--->
    <div id="googleMap" style="width:100%;height:400px;margin-top:800px;margin-bottom:100px"></div>
    <script>function myMap();</script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXFCmrTMaJjS6p5dQmPKasqMEm_G70wuc&callback=myMap"></script>

</body>

<!-- Footer -->
<footer class="page-footer font-small bg-dark footer fixed-bottom">
    <!-- Content -->
    <div class="footer-copyright text-center py-3">
        Nina Wüest | Dominik Rimann
    </div>
</footer>