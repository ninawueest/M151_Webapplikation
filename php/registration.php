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




/***Login
//$sql = "SELECT perId, perBenutzername, perPasswort FROM tbl_Person WHERE perBenutzername = ?";
//$sql = "SELECT perPasswort FROM tbl_Person WHERE perBenutzername = ?";
//$conn->multi_query("CALL func_SelectLoginData('$username')");

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


/***
$conn = db_connect();
$username = htmlspecialchars(trim(stripslashes($_POST['perBenutzername'])));
//$sql = "SELECT perId, perBenutzername, perPasswort FROM tbl_Person WHERE perBenutzername = ?";
//$sql = "SELECT perPasswort FROM tbl_Person WHERE perBenutzername = ?";
$conn->multi_query("CALL func_SelectLoginData('$username')");

//$statement = $conn->prepare($sql);
//$statement->bind_param('s', $_POST['perBenutzername']);
//$execReturn = $statement->execute();

if ($execReturn) {
$statement->store_result();
$statement->bind_result($perPasswort);
$statement->fetch();
if (password_verify($_POST['perPasswort'], $perPasswort)) {
//Session stuff will follow here
redirect_to("../view/home-view.php");
} else {
echo "Error 1st else";
echo $statement->error;
}
} else {
//echo "Error: " . $conn->error;
echo $statement->error;
}
 ***/





















/**
 *
 *
 *
 * INSERT INTO tbl_Ort (ortPostleitzahl, ortOrtsbezeichnung) VALUES ('3000', 'Baden');
SET @ortID = LAST_INSERT_ID();
INSERT INTO tbl_Adresse (adrStrassenname, adrHausnummer, ortId) VALUES ('Musterstrasse', '5', @ortID);
SET @AdresseID = LAST_INSERT_ID();
INSERT INTO tbl_Kontakt (konEmail) VALUES ('muster@gmail.com');
SET @KontaktID = LAST_INSERT_ID();
INSERT INTO tbl_Person (perBenutzername, perVorname, perNachname, perPasswort, konId, adrId) VALUES ('BName', 'Max', 'Muster', '1234', @AdresseID, @KontaktID);



DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_InsertRegistrationData`(
IN `p_perBenutzername` VARCHAR(50),
IN `p_perVorname` VARCHAR(30),
IN `p_perNachname` VARCHAR(30),
IN `p_perPasswort` VARCHAR(255),
IN `p_ortPostleitzahl` INT(11),
IN `p_ortOrtsbezeichnung`
IN `p_adrStrassenname` VARCHAR(30),
IN `p_adrHausnummer` VARCHAR(5),
IN `p_konEmail` VARCHAR(255))
NO SQL
BEGIN

SET @ortID = func_InsertOrt(`p_ortPostleitzahl`, `p_ortOrtsbezeichnung`);
SET @adrID = func_InsertAdresse(`p_adrStrassenname`, `p_adrHausnummer`, @ortID );
SET @konID = func_InsertKontakt(`p_konEmail`);
SET @perID = func_InsertPerson(`p_perBenutzername`, `p_perVorname`, `p_perNachname`, `p_perPasswort`, @konID, @adrID);

END
 *
INSERT INTO tbl_Kontakt (konEmail) VALUES (p_konEmail);





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