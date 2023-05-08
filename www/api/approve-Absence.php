<?php
    header(header: 'Content-Type: application/json; charset=utf-8');
    require_once ('../connection.php');

    if ($_SERVER['REQUEST_METHOD'] != 'GET') {
        http_response_code(response_code:405);
        die(json_encode(array('code' => 4, 'message' => 'This API only supports GET')));
    }

    if (!isset($_GET['id']) || !isset($_GET['username']) ) {
        die(json_encode(array('code' => 1, 'message' => 'Parameters not valid')));
    }
      
    $id = $_GET['id'];
    $username = $_GET['username'];
    $dayoff = 0;
    $status = 'approved';
    $row = array();

    $sql = 'SELECT dayoff FROM account WHERE username = ?';

    $stmt = $dbCon->prepare($sql);
    $stmt->bind_param('s',$username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) { 
        $row = $result->fetch_assoc();
        $dayoff = $row['dayoff'];
    }
    else {
        die(json_encode(array('code' => 1, 'message' => 'Không tìm thấy tài khoản')));
    }
        

    $sql = 'SELECT dayAbsence FROM requestabsence where id = ?';

    $stmt = $dbCon->prepare($sql);
    $stmt->bind_param('i',$id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $dayoff = $dayoff + $row['dayAbsence'];  

    $sql = 'UPDATE account set dayoff = ? WHERE username = ?';
    $stmt = $dbCon->prepare($sql);
    $stmt->bind_param('is',$dayoff,$username);
    $stmt->execute();

    $sql = 'UPDATE requestabsence set status = ? WHERE id = ?';

    $stmt = $dbCon->prepare($sql);
    $stmt->bind_param('si',$status,$id);
    $stmt->execute();
    die(json_encode(array('code' => 0, 'message' => 'Approved succes')));

?>