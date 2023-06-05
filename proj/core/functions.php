<?php
include_once "config.php";
function clear($input){
    $input = trim($input);
    $input = htmlspecialchars($input,ENT_QUOTES,"UTF-8"); // مايحط اكواد HTML
    $input = strip_tags($input); // 
    return  $input;
    //هنا لاحل الحماية ( المستخدم لايستطيع ادخال اكواد في الفراغات )
}

function redirect($path){
    header("location: ".ROOT."/".$path);
    die;
}

function checkLogin($email){
    if($_SESSION['email'] == "" || !isset($_SESSION['email'])){
        header("location: ".ROOT."/login");
        die;

        //التحقق من الايميل موجود او لا 
    }
}