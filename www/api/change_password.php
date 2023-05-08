<?php
    session_start();
    header(header: 'Content-Type: application/json; charset=utf-8');

    require_once('connection.php');
    $sql = 'UPDATE account set password = ?, activated = ? where username = ?';

    $active = '1';
    $pass = $_POST['pass'];
    $pass = $_SESSION['user'];
    $passhass = password_hash($pass,PASSWORD_DEFAULT);

    $stmt = $dbCon->prepare($sql);
    $stmt->bind_param('sss',$passhass,$active,$_SESSION['user']);
    $stmt->execute();


?>