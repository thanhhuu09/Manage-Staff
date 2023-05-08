<?php
    header(header: 'Content-Type: application/json; charset=utf-8');
    require_once ('../connection.php');

    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        http_response_code(response_code:405);
        die(json_encode(array('code' => 4, 'message' => 'This API only supports POST')));
    }

    if (!isset($_POST['id-task']) ) {
        die(json_encode(array('code' => 1, 'message' => 'Parameters not valid')));
    }

    $id = $_POST['id-task'];
    $rating = $_POST['rating-task'];

    $sql = 'UPDATE `task` SET `rating`=?, `process`=? WHERE `id` = ?';

    $stm = $dbCon->prepare($sql);

    $process = "task-complete";
    $stm->bind_param("sss", $rating, $process ,$id);
    $stm->execute();
    $result = $stm -> get_result();
    if ($dbCon -> affected_rows > 0){
        error_response(0, "Đánh giá tác vụ thành công");
    }
    error_response(5, "Đánh giá thất bại! Có lỗi xảy ra.");



?>