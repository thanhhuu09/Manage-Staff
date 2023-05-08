<?php

#  https://www.w3schools.com/php/php_mysql_select.asp

$host = 'mysql-server'; // tên mysql server
$usernamedb = 'root';
$passworddb = 'root';
$db = 'project'; // tên databse
$none = '';


$dbCon = new mysqli($host, $usernamedb, $passworddb, $db);
$dbCon->set_charset("utf8");
if ($dbCon->connect_error) {
    echo "Loi ket noi Database";
    exit();
}

function error_response($code, $message){
    $res = array();
    $res['code'] = $code;
    $res['message'] = $message;

    die(json_encode($res));
}

?> 