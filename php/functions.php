<?php
/**
 * Created by PhpStorm.
 * User: Dominik
 * Date: 2018-12-14
 * Time: 13:23
 */

// redirect to other page
function redirect_to($url) {
    header("Location: " . $url);
    exit();
}

// return the username session
function return_username() {
    echo $_SESSION['user_username'];
}