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
                <li><a href="../php/logout.php" style="color:white">Logout</a></li>
            </ul>
        </div>
    </nav>

    <!---main content--->
    <span class="title display-1">
            <!--return the username session-->
            <?php return_username(); ?>
    </span>

</body>

<!-- Footer -->
<footer class="page-footer font-small bg-dark footer fixed-bottom">
    <!-- Content -->
    <div class="footer-copyright text-center py-3">
        Nina Wüest | Dominik Rimann
    </div>
</footer>