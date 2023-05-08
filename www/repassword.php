<?php
    session_start();
    $error = '';
    $pass = '';
    $pass_confirm = '';
   if (!isset($_SESSION['user'])) {
       header('Location: login.php');
       exit();
   }
//    if ($_SESSION['activated'] == 1){
//        header("Location: index.php");
//        exit();
//    }
    // if (isset($_POST['pass']) && isset($_POST['pass-confirm']) && isset($_POST['login'])) {
//
//        $pass = $_POST['pass'];
//        $pass_confirm = $_POST['pass-confirm'];
//        if (empty($pass)) {
//            $error = 'Vui lòng nhập mật khẩu';
//        }
//        else if (strlen($pass) < 6) {
//            $error = 'Mật khẩu phải có ít nhất 6 ký tự';
//        }
//        else if ($pass != $pass_confirm) {
//            $error = 'Mật khẩu không trùng khớp';
//        }
//        else {
//            // echo "hello";
//            require_once('connection.php');
//            $_SESSION['activated'] = 1;
//            echo '<script type="text/JavaScript"> location.reload(); </script>';
    //     $pass = $_POST['pass'];
    //     $pass_confirm = $_POST['pass-confirm'];
    //     if (empty($pass)) {
    //         $error = 'Vui lòng nhập mật khẩu';
    //     }
    //     else if (strlen($pass) < 6) {
    //         $error = 'Mật khẩu phải có ít nhất 6 ký tự';
    //     }
    //     else if ($pass != $pass_confirm) {
    //         $error = 'Mật khẩu không trùng khớp';
    //     }
    //     else {
    //         // echo "hello";
    //         require_once('connection.php');
    //         $_SESSION['activated'] = 1;
    //         $sql = 'UPDATE account set password = ?, activated = ? where username = ?';

    //         $active = '1';
    //         $passhass = password_hash($pass,PASSWORD_DEFAULT);

    //         $stmt = $dbCon->prepare($sql);
    //         $stmt->bind_param('sss',$passhass,$active,$_SESSION['user']);
    //         $stmt->execute();
    //         header("Location: index.php");
    //         exit();

    //     }
//     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Change Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">

</head>
<body>
<div class="container align-items-center min-vh-100">
    <div class="row">

        <div class="col-md-6 col-sm-12 mb-3">
            <h1 class="text-center mt-3 mb-2">Đổi mật khẩu</h1>
            <p class="text-center text-secondary px-sm-2">Vui lòng đổi mật khẩu trước khi tiến hành đăng nhập.</p>
            <!-- <form method="post" class="px-4 px-sm-4 px-m-5 px-lg-4 pt-3"> -->
                <div class="renew">
                    <div class="form-group">
                        <input id="newpassword" name="pass" type="password" class="form-input" placeholder="Nhập mật khẩu mới">
                    </div>
                    <div class="form-group">
                        <input id="validation" name="pass-confirm" type="password" class="form-input" placeholder="Nhập lại mật khẩu mới">
                    </div>
                </div>
                <div class="input-group custom-control custom-checkbox pt-2">
                    <div class="custom-button text-right">
                        <a href="logout.php" class="btn btn-logout">Đăng xuất</a>
                        <button type="submit" onclick="activeAccount()" class="btn btn-success btn-login">Đăng nhập</button>
                    </div>
                </div>
                <div id = 'error-activeAccount' style="display: none;" class='alert-danger'></div>;
        </div>

        <div class="navbar-user-list" style="display: none;">
                <a class = "navbar-user-item" href="./profile.php">Tài khoản của tôi</a>
                <a class = "navbar-user-item" href="logout.php">Đăng xuất</a>
        </div>

        <div class="col-md-6 col-sm-0">
            <img  class="img" src="images/repassword.svg" alt="login"/>
        </div>
    </div>
</div>

<script src="./main.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
