<?php
    session_start();
    header(header: 'Content-Type: application/json; charset=utf-8');
    require_once ('../connection.php');

    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        http_response_code(response_code:405);
        die(json_encode(array('code' => 4, 'message' => 'This API only supports POST')));
    }
  
    $input = json_decode(file_get_contents('php://input'));
    if (is_null($input)) {
        die(json_encode(array('code' => 2, 'message' => 'This API only supports JSON')));
    }

    if (!property_exists($input,property:'pass') ||
    !property_exists($input,property:'newpass')) 
    {
        http_response_code(response_code:400);
        die(json_encode(array('code' => 1, 'message' => 'Invalid Input')));
    }

    if (empty($input->pass) || empty($input->newpass)) {
        die(json_encode(array('code' => 1, 'message' => 'Invalid Input')));
    }

    $pass = $input->pass;
    $pass_confirm = $input->newpass;

    if (empty($pass)) {
        die(json_encode(array('code' => 1, 'message' => 'Vui lòng nhập mật khẩu')));
    }
    else if (strlen($pass) < 6) {
        die(json_encode(array('code' => 1, 'message' => 'Mật khẩu phải có ít nhất 6 ký tự')));
    }
    else if ($pass != $pass_confirm) {
        die(json_encode(array('code' => 1, 'message' => 'Mật khẩu không trùng khớp')));
    }

    $_SESSION['activated'] = 1;
    $sql = 'UPDATE account set password = ?, activated = ? where username = ?';
    $active = 1;
    $passhass = password_hash($pass,PASSWORD_DEFAULT);

    $stmt = $dbCon->prepare($sql);
    $stmt->bind_param('sis',$passhass,$active,$_SESSION['user']);
    $stmt->execute();
    if ($_SESSION['role'] == 2) {
        die(json_encode(array('code' => 0, 'message' => 'index-ql.php')));
    }
    else if ($_SESSION['role'] == 1) {
        die(json_encode(array('code' => 0, 'message' => 'index.php')));
    }
?>