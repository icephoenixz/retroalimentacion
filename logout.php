<?php
include_once 'classes/Session.php';
Session::start();
include_once "classes/Users.php";
$user = new Users();
$user->userLogout();
?>