<?php
    header(header: 'Content-Type: application/json; charset=utf-8');
    require_once ('../connection.php');

    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        http_response_code(response_code:405);
        die(json_encode(array('code' => 4, 'message' => 'This API only supports POST')));
    }

    $input = json_decode(file_get_contents('php://input'));
    // echo json_encode(array('status' => true, 'data' => $input));
    if (is_null($input)) {
        die(json_encode(array('code' => 2, 'message' => 'This API only supports JSON')));
    }

    if (!property_exists($input,property:'username') ||
    !property_exists($input,property:'department'))
    {
        http_response_code(response_code:400);
        die(json_encode(array('code' => 1, 'message' => 'Invalid Input')));
    }

    if (empty($input->username) || empty($input->department)) {
        die(json_encode(array('code' => 1, 'message' => 'Invalid Input')));
    }

    $username = $input->username;
    $department = $input->department;
    $role = 2;
    $position = 'Trưởng phòng';

    $sql = 'SELECT * FROM account WHERE username = ?';
    $stmt = $dbCon->prepare($sql);
    $stmt->bind_param('s',$username);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows == 0) {
        die(json_encode(array('code' => 1, 'message' => 'Tài khoản nhân viên này không tồn tại')));
    }

    $sql = 'SELECT * FROM department WHERE manager = ?';
    $stmt = $dbCon->prepare($sql);
    $stmt->bind_param('s',$username);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows == 0) {
        $sql = 'SELECT manager FROM department WHERE id = ?';
        $stmt = $dbCon->prepare($sql);
        $stmt->bind_param('i',$department);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();     
        if (strlen($data['manager']) == 0) {
            // Update for department table
            $sql = 'UPDATE department set manager = ? where id = ?';

            $stmt = $dbCon->prepare($sql);
            $stmt->bind_param('si',$username,$department);
            $stmt->execute();
            

            //Update for account table
            $sql = 'UPDATE account set role = ?, position = ? where username = ?';

            $stmt = $dbCon->prepare($sql);
            $stmt->bind_param('iss',$role,$position,$username);
            $stmt->execute();
            die(json_encode(array('code' => 0, 'message' => 'Appoint success')));
        }
        else {
            die(json_encode(array('code' => 1, 'message' => 'Phòng này đã có trưởng phòng')));
        }
    }
    else {
        die(json_encode(array('code' => 1, 'message' => 'Nhân viên này đã là trưởng phòng')));
    } 
?>