<?php
/**
 * Created by PhpStorm.
 * User: Dominik
 * Date: 2018-11-30
 * Time: 15:36
 */
require_once "db_connection.php";

db_connect();

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
        redirect_to("../home.php");
    } else {
        redirect_to("../index.php?login_error=true");
    }
} else {
    echo "Error: " . $conn->error;
}

