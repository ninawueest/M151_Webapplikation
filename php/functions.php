<?php
/**
 * Created by PhpStorm.
 * User: Dominik
 * Date: 2018-12-14
 * Time: 13:23
 */

function redirect_to($url) {
    header("Location: " . $url);
    exit();
}

function return_username() {
    echo $_SESSION['user_username'];
}