<?php
session_start();

$_SESSION = array();

session_destroy();

header("Location: cp_login.php");
exit;
