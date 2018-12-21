<?php
/**
 * Created by PhpStorm.
 * User: Dominik
 * Date: 2018-12-07
 * Time: 14:27
 */

require_once "functions.php";

// destroy all sessions
session_destroy();

redirect_to("../login-view.php");