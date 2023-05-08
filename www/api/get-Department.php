<?php
    header(header: 'Content-Type: application/json; charset=utf-8');
    require_once ('../connection.php');

    if ($_SERVER['REQUEST_METHOD'] != 'GET') {
        http_response_code(response_code:405);
        die(json_encode(array('code' => 4, 'message' => 'This API only supports GET')));
    }

    if (!isset($_GET['id']) ) {
        die(json_encode(array('code' => 1, 'message' => 'Parameters not valid')));
    }
      
    $id = $_GET['id'];
    $data1 = array();
    $data2 = array();
    $data = array();

        $sql = 'SELECT departmentName,description,room,manager FROM department where id = ?';
        $stmt = $dbCon->prepare($sql);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $data1 = $result->fetch_assoc();
            $sql = 'SELECT name,phone,mail FROM account where username = ?';
            $stmt = $dbCon->prepare($sql);
            $stmt->bind_param('s',$data1['manager']);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $data2 = $result->fetch_assoc();
                $data = array_merge($data1, $data2);
                die(json_encode(array('code' => 0, 'data' => $data)));
            }
            else {
                die(json_encode(array('code' => 2, 'data' => $data1)));
            }
            
        }
        else {
            die(json_encode(array('code' => 1, 'message' => 'Error')));
        }
?>