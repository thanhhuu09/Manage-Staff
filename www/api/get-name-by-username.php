<?php
    header(header: 'Content-Type: application/json; charset=utf-8');
    require_once ('../connection.php');

    if ($_SERVER['REQUEST_METHOD'] != 'GET') {
        http_response_code(response_code:405);
        error_response(4, 'This API only supports GET');
    }

    if (!isset($_GET['username'])) {
        error_response(1, 'Parameters not valid');
    }

    $username = $_GET['username'];

    $sql = 'SELECT name FROM account where username = ?';

    $stmt = $dbCon->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt -> get_result();

    $data =  $result->fetch_assoc();

    die(json_encode(array('code' => 0, 'data' => $data)));

?>