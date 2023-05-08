<?php
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link
        rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 mt-5 mx-auto p-3 border rounded">
            <h3 style="color: var(--dark-green)">Bạn không có quyền truy cập trang này</h3>
            <?php
            $link = 'avc';
                if ($_SESSION['role'] == 1){
                    $link = 'index.php';
                }
                else if ($_SESSION['role'] == 2){
                    $link = 'index-ql.php';
                }
                else {
                    $link = 'manageAccount.php';
                }
            ?>
            <p>Nhấn <a href="<?php echo $link?>">vào đây</a> để trở về trang chủ</p>
            <div class="col-md-6 col-sm-0">
                <img  class="img" src="images/undraw_forgot_password_re_hxwm.svg" alt="login"/>
            </div>
        </div>
    </div>
</div>
</body>
</html>
