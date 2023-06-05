<?php
include_once "config.php";

$db = mysqli_connect(HOST,USER,PASS,DBNAME);

if(!$db){
    echo "Error in Database";
}