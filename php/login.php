<?php
/**
 * Created by PhpStorm.
 * User: Dominik
 * Date: 2018-11-30
 * Time: 15:36
 */
require_once "db_connection.php";
require_once "functions.php";

db_connect();

$sql = "SELECT perId, perBenutzername, perPasswort FROM tbl_Person WHERE perBenutzername = ?";
$statement = $conn->prepare($sql);
$statement->bind_param('s', $_POST['perBenutzername']);
$statement->execute();
$statement->store_result();
$statement->bind_result($perId, $perBenutzername, $perPasswort);
$statement->fetch();

if ($statement->execute()) {
    if (password_verify($_POST['perPasswort'], $perPasswort)) {
        //Session stuff will follow here
        redirect_to("../view/home-view.php");
    } else {
        echo "Error 1st else";
    }
} else {
    echo "Error: " . $conn->error;
}


























/**
$sql = "SELECT id, username, password FROM users WHERE username = ?";
$statement = $conn->prepare($sql);
$statement->bind_param('s', $_POST['lalala']);
$statement->execute();
$statement->store_result();
$statement->bind_result($id, $username, $password);
$statement->fetch();

if ($statement->execute()) {
    if(password_verify($_POST['password'], $password)) {
        $_SESSION['user_id'] = $id;
        $_SESSION['user_username'] = $username;
        redirect_to("../home-view.php");
    } else {
        redirect_to("../login-view.php?login_error=true");
    }
} else {
    echo "Error: " . $conn->error;
}
**/
