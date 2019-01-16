<?php
/**
 * Created by PhpStorm.
 * User: Dominik
 * Date: 2018-12-07
 * Time: 14:27
 */

require_once "functions.php";

// remove all session variables
session_unset();

// destroy all sessions
session_destroy();

// back to login page
redirect_to("../view/login-view.php");