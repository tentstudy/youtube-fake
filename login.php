<?php
    session_start();
    require_once 'connect.php';
    
    if(!empty($_SESSION['email'])){
        header('Location: index.php');
    }
    if(isset($_POST['btnLogin'])) {
        $email = htmlspecialchars($_POST['email']);
        $pass = md5(htmlspecialchars($_POST['password']));
        $query = "select id from users where email = '{$email}' and password ='{$pass}'";
        $result = $conn->query($query);
        if($result->num_rows>0){
            $user = $result->fetch_assoc();

            $_SESSION['email'] = $email;
            $_SESSION['user_id'] = $user['id'];
            header('Location: index.php');
        }
        else {
            $error = "Taì khoản hoặc mật khẩu ko chính xác";
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
        <link rel="stylesheet" href="css/login.css">
        <!-- <link rel="stylesheet" type="text/css" href="/css/index.css"> -->
    </head>
    <body>
        <form method="POST">
            <div id="content">
                <img class="logo" src="images/LG.png" alt=""><br>
                <h3>Đăng nhập</h3>
                <p>Tiếp tục với YouTube</p> <br>
                 <?php
                    if(isset($error)){
                        echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
                    }
                ?>      
                <p>Email</p>
                <input type="text" name="email" class="form-control" value="<?php if (isset($_GET['email'])) echo htmlspecialchars($_GET['email'])?>">
                <p>Mật khẩu</p>
                <input type="password" name="password" class="form-control"><br>
                <a href="">Quên mật khẩu?</a><br> <br>
                <div class="option">
                    <button type="submit" class="btnLogin next" name="btnLogin"><b>Đăng nhập</b></button>
                </div>
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
=======

<head>
    <title>YouTube</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once __DIR__ . '/view/css.php'; ?>
    <?php require_once __DIR__ . '/view/js.php'; ?>
    <link rel="stylesheet" href="css/login.css">
    <!-- <link rel="stylesheet" type="text/css" href="/css/index.css"> -->
</head>

<body>
    <div id="content">
        <img class="logo" src="images/LG.png" alt=""><br>
        <h3>Đăng nhập</h3>
        <p>Tiếp tục với YouTube</p> <br>
        <p>Email</p>
        <input type="text" class="form-control">
        <p>Mật khẩu</p>
        <input type="password" class="form-control"><br>
        <a href="">Bạn quên mật khẩu?</a><br> <br>
        <div class="create" ><a href="">Tạo tài khoản mới</a></div>
        <button class="login"><b>ĐĂNG NHẬP</b></button>
    </div>
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

>>>>>>> 6fb85cf0c503b85141ea58f3d0768fdd5acb7b97
</html>