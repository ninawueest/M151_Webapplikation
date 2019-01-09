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
        echo "Error 1st else";
        echo $statement->error;
    }
} else {
    //echo "Error: " . $conn->error;
    echo $statement->error;
}



