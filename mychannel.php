<?php
    session_start();
    require_once 'connect.php';
    if(isset($_SESSION['user_id'])){
        $id = $_SESSION['user_id'];
        $page = $_GET['page'];
        $videoPerPage = 6;
        $start = ($page - 1)* $videoPerPage;
        $end = $start + $videoPerPage;
        $limitvideo = "select video.id,video.email,name_video, luot_xem from video,users where users.id = {$id} and users.email = video.email order by video.ngay_dang limit {$start},{$end}";

        $result = $conn->query($limitvideo);
        $mang_video = [];
        if($result->num_rows>0){
            while ($row = $result->fetch_assoc()) {
            # code...
            array_push($mang_video, $row);
            }
        }
        $query = "select count(*) as totalvideo from video,users where users.id = {$id} and users.email = video.email";
        $result = $conn->query($query); 
        $total = $result->fetch_assoc()['totalvideo'];
    }
    else{
        header('Location: login.php');
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
        <!-- <link rel="stylesheet" type="text/css" href="/css/index.css"> -->
        <style>
        .content1{
        height: 800px;
        width: 1903px;
        }
        </style>
    </head>
    <body>
        <?php require_once __DIR__ . '/view/navbar.php'; ?>
        <div class="content1">
            <?php require_once __DIR__ . '/view/mychannel.php'; ?>
        </div>
    </body>
</html>