<?php
/**
 * Created by PhpStorm.
 * User: Dominik
 * Date: 2018-11-30
 * Time: 15:36
 */
require_once "db_connection.php";
require_once "functions.php";

// database connection
$conn = db_connect();

// call the procedure
$sql = "CALL proc_SelectLoginData(?)";
// send statement to server
$statement = $conn->prepare($sql);
// bind perBenutzername to statement
$statement->bind_param('s', $_POST['perBenutzername']);
// execute the statement
$execReturn = $statement->execute();

// check if statement execute = true
if ($execReturn) {
    $statement->store_result();
    $statement->bind_result($perId, $perBenutzername, $perPasswort);
    $statement->fetch();

    // check if password correct
    if (password_verify($_POST['perPasswort'], $perPasswort)) {
        // set the sessions and redirect to home-view
        $_SESSION['user_id'] = $perId;
        $_SESSION['user_username'] = $perBenutzername;
        redirect_to("../view/home-view.php");
    } else {
        redirect_to("../view/login-view.php");
    }
} else {
    echo $statement->error;
}






















/*** Mit Redundanz
BEGIN
INSERT INTO tbl_Ort (ortPostleitzahl, ortOrtsbezeichnung) VALUES (p_ortPostleitzahl, p_ortOrtsbezeichnung);
RETURN (LAST_INSERT_ID());
END
***/
/*** Ohne Redundanz (Nimmt Daten von erster Registration einer PLZ)
BEGIN
    DECLARE r_ortId INT;
    SELECT ortId INTO r_ortId FROM tbl_Ort WHERE ortPostleitzahl = p_ortPostleitzahl;
    IF (r_ortId IS NULL) THEN
        INSERT INTO tbl_Ort (ortPostleitzahl, ortOrtsbezeichnung) VALUES (p_ortPostleitzahl, p_ortOrtsbezeichnung);
        SELECT LAST_INSERT_ID() INTO r_ortId FROM DUAL;
    END IF;
    RETURN (r_ortId);
END
***/
/*** Ohne Redundanz (Aktualisiert zusätzlich die Ortsbezeichnung)
BEGIN
    DECLARE r_ortId INT;
    DECLARE r_ortOrtsbezeichnung VARCHAR(18);
    SELECT ortId, ortOrtsbezeichnung INTO r_ortId, r_ortOrtsbezeichnung FROM tbl_Ort WHERE ortPostleitzahl = p_ortPostleitzahl;
    IF (r_ortId IS NULL) THEN
        INSERT INTO tbl_Ort (ortPostleitzahl, ortOrtsbezeichnung) VALUES (p_ortPostleitzahl, p_ortOrtsbezeichnung);
        SELECT LAST_INSERT_ID() INTO r_ortId FROM DUAL;
    ELSEIF (r_ortOrtsbezeichnung != p_ortOrtsbezeichnung) THEN
    	UPDATE tbl_Ort SET ortOrtsbezeichnung = p_ortOrtsbezeichnung WHERE ortId = r_ortId;
    END IF;
    RETURN (r_ortId);
END
***/






















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

