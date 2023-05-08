<?php
    header(header: 'Content-Type: application/json; charset=utf-8');
    require_once ('../connection.php');

    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        http_response_code(response_code:405);
        error_response(4, 'This API only supports POST');
    }

    if (!isset($_POST['id']) ) {
        error_response(1, 'Parameters not valid');
    }

    $id = $_POST['id'];
    $process = $_POST['process'];

    $sql = 'UPDATE `task` SET `process`=? WHERE id = ?';

    $stm = $dbCon->prepare($sql);
    $stm->bind_param("ss", $process, $id);
    $stm->execute();
    $result = $stm -> get_result();

    if($dbCon -> affected_rows > 0){
        error_response(0, "Hủy bỏ tác vụ thành công");
    }
    error_response(5, "Hủy bỏ tác vụ thất bại! Hoặc không có thay đổi nào");


?>