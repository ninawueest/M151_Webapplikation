<?php
/**
 * Created by PhpStorm.
 * User: Dominik
 * Date: 2018-12-07
 * Time: 14:28
 */

require_once "db_connection.php";
require_once "functions.php";

db_connect();

if ($_POST['perPasswort'] == $_POST['perPasswort2']) {
    $sql = "";
    $statement = $conn->prepare($sql);
    $statement->bind_param();

    if ($statement->execute()) {
        redirect_to("../login-view.php");
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Wrong password";
}

$conn->close();





/**
require_once "db_connection.php";
require_once "functions.php";

db_connect();

if($_POST['password'] == $_POST['password2']) {
    $sql = "INSERT INTO users (username, password, location) VALUES (?, ?, ?)";
    $statement = $conn->prepare($sql);
    $statement->bind_param('sss', $_POST['username'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['location']);

    if ($statement->execute()) {
        redirect_to("../login-view.php?registered=true");
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    redirect_to("../login-view.php?register_error=true");
}
$conn->close();
 **/