<?php
/**
 * Created by PhpStorm.
 * User: Dominik
 * Date: 2018-12-07
 * Time: 14:35
 */

//session_start();

function db_connect() {
    global $conn; // db connection variable
    $db_server = "localhost";
    $username = "root";
    $password = "root";
    $db_name = "m151_db";

    // create a connection
    $conn = new mysqli($db_server, $username, $password, $db_name);

    // check connection for errors
    if ($conn->connect_error) {
        die("Error: " . $conn->connect_error);
    }
}

