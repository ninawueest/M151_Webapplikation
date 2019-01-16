<?php
/**
 * Created by PhpStorm.
 * User: Dominik
 * Date: 2018-12-07
 * Time: 14:28
 */

require_once "db_connection.php";
require_once "functions.php";

// database connection
$conn = db_connect();

// check if password = confirm password
if ($_POST['perPasswort'] == $_POST['perPasswort2']) {
    // call the procedure
    $sql = "CALL proc_InsertRegistrationData(?, ?, ?, ?, ?, ?, ?, ?, ?)";
    // send statement to server
    $statement = $conn->prepare($sql);
    // bind parameters to statement
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

    // execute the statement and redirect to the login-view
    if ($statement->execute()) {
        redirect_to("../view/login-view.php");
    } else {
        echo "Error: " . $conn->error;

    }
} else {
    redirect_to("../view/registration-view.php");
}

// close the database connection
$conn->close();



