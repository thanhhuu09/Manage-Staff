<?php
    header(header: 'Content-Type: application/json; charset=utf-8');
    require_once ('../connection.php');

    if ($_SERVER['REQUEST_METHOD'] != 'GET') {
        http_response_code(response_code:405);
        die(json_encode(array('code' => 4, 'message' => 'This API only supports GET')));
    }

    if (!isset($_GET['id']) || !isset($_GET['user'])) {
        die(json_encode(array('code' => 1, 'message' => 'Parameters not valid')));
    }
    
    $id = $_GET['id'];
    $user = $_GET['user'];
    $manager = '';
    $position = 'Nhân viên';
    $role = 1;
    // Update for department table
    $sql = 'UPDATE department set manager = ? where id = ?';

    $stmt = $dbCon->prepare($sql);
    $stmt->bind_param('si',$manager,$id);
    $stmt->execute();

    //Update for account table
    $sql = 'UPDATE account set role = ?, position = ? where username = ?';

    $stmt = $dbCon->prepare($sql);
    $stmt->bind_param('iss',$role,$position,$user);
    $stmt->execute();
    die(json_encode(array('code' => 0, 'message' => 'Dismiss success')));

?>