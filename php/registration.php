<?php
/**
 * Created by PhpStorm.
 * User: Dominik
 * Date: 2018-12-07
 * Time: 14:28
 */

require_once "db_connection.php";
require_once "functions.php";

$conn = db_connect();

if ($_POST['perPasswort'] == $_POST['perPasswort2']) {
    $sql = "CALL proc_InsertRegistrationData(?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $statement = $conn->prepare($sql);
    $statement->bind_param('sssssssss',
        $_POST['perBenutzername'],
        $_POST['perVorname'],
        $_POST['perNachname'],
        password_hash($_POST['perPasswort'], PASSWORD_DEFAULT),
        $_POST['ortPostleitzahl'],
        $_POST['ortOrtsbezeichnung'],
        $_POST['adrStrassenname'],
        $_POST['adrHausnummer'],
        $_POST['konEmail']
    );

    if ($statement->execute()) {
        redirect_to("../view/login-view.php");
    } else {
        echo "Error: " . $conn->error;

    }
} else {
    echo "Wrong password";
}

$conn->close();



