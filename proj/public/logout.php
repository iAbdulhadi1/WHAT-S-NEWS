<?php
include_once "../core/functions.php";
error_reporting(0);
session_start();
session_destroy();
session_unset();
unset($_SESSION);
redirect('login');