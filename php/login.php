<?php
/**
 * Created by PhpStorm.
 * User: Dominik
 * Date: 2018-11-30
 * Time: 15:36
 */
require_once "db_connection.php";
require_once "functions.php";

$conn = db_connect();

$sql = "CALL proc_SelectLoginData(?)";
$statement = $conn->prepare($sql);
$statement->bind_param('s', $_POST['perBenutzername']);
$execReturn = $statement->execute();

if ($execReturn) {
    $statement->store_result();
    $statement->bind_result($perId, $perBenutzername, $perPasswort);
    $statement->fetch();
    if (password_verify($_POST['perPasswort'], $perPasswort)) {
        //Session stuff
        $_SESSION['user_id'] = $perId;
        $_SESSION['user_username'] = $perBenutzername;
        redirect_to("../view/home-view.php");
    } else {
        redirect_to("../view/login-view.php");
    }
} else {
    echo $statement->error;
}


























/***

$conn = db_connect();

//$sql = "SELECT perPasswort FROM tbl_Person WHERE perBenutzername = ?";
$sql = "CALL proc_SelectLoginData(?)";
$statement = $conn->prepare($sql);
$statement->bind_param('s', $_POST['perBenutzername']);
$execReturn = $statement->execute();

if ($execReturn) {
    $statement->store_result();
    $statement->bind_result($perPasswort);
    $statement->fetch();
    if (password_verify($_POST['perPasswort'], $perPasswort)) {
        //Session stuff will follow here
        redirect_to("../view/home-view.php");
        //echo $perPasswort;
    } else {
        redirect_to("../view/login-view.php");
        //echo "Error: False password";
        //echo $statement->error;
    }
} else {
    //echo "Error: " . $conn->error;
    echo $statement->error;
}

***/

