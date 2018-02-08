<?php
    require_once 'connect.php';
    session_start();
    if (!empty($_SESSION['email'])) {
        header('Location: index.php');
        exit();
    }
    if (isset($_POST['btnRegister'])) {
        $email = htmlspecialchars($_POST['email']);
        $pass = md5(htmlspecialchars($_POST['password']));
        $repass = md5(htmlspecialchars($_POST['repassword']));
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Email không đúng"; 
        }
        else{
            if ($pass != $repass){
                $error ="Mật khẩu không trùng khớp";
                echo $error;
            }
            else{
                $query = "select email from users where email = '{$email}'";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    $error = "Taì khoản đã tồn tại";
                    echo $error;
                } else {
                    $query = "INSERT INTO users (email, password) values ('{$email}','{$pass}')";
                    echo $query;
                    $result = $conn->query($query);
                    if ($result){
                        header("Location: index.php");
                        exit();
                    }
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>YouTube</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once __DIR__ . '/view/css.php'; ?>
    <?php require_once __DIR__ . '/view/js.php'; ?>
    <link rel="stylesheet" href="css/registration.css">
    <!-- <link rel="stylesheet" type="text/css" href="/css/index.css"> -->
</head>

<body>
    <form action="" method="post">
        <div id="content">
            <img class="logo" src="images/LG.png" alt=""><br>
            <h3>Đăng kí</h3>
            <p>Tiếp tục với YouTube</p> <br>
            <?php
                if(isset($error)){
                    echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
                }
            ?> 
            <p>Email</p>
            <input type="text" class="form-control" name="email">
            <p>Mật khẩu</p>
            <input type="password" class="form-control" name="password">
            <p>Xác nhận mật khẩu</p>
            <input type="password" class="form-control" name="repassword"><br>
            <button type="submit" class="next"  name="btnRegister">ĐĂNG KÍ</button>
        </div>
    </form>
    <div class="under">
    	<select class="langue" name="" id="">
    		<option value="">Tiếng Việt</option>
    		<option value="">Tiếng Anh</option>
    		<option value="">Tiếng Trung Quốc</option>
    		<option value="">Tiếng Tàu Khựa</option>
    	</select>
    	<ul class="help">
            <li><a href="">Trợ giúp</a></li>
            <li><a href="">Bảo mật</a></li>
    		<li><a href="">Điều khoản</a></li>
    	</ul>
    </div>
</body>

</html>