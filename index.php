<?php 
    session_start();
    require_once 'connect.php';
    $query = "select ten_channel,ma_channel from channel";
    $result = $conn->query($query);
    $mangchannel = [];
    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
            # code...
            array_push($mangchannel, $row);
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
        <link rel="stylesheet" href="/css/index.css">

        
        <!-- <link rel="stylesheet" type="text/css" href="/css/index.css"> -->
    </head>
    <body>
        <?php require_once __DIR__ . '/view/navbar.php'; ?>

        <div style="max-width: 1400px; margin: 0 auto">
        <?php require_once __DIR__ . '/view/sidebar.php'; ?>
        <div id="content">
            <?php foreach ($mangchannel as $channel): ?>
            
            <div class="head">
                <div class="name">
                    <img class="img_head" src="images/img.png" alt="">
                    <span class="name_head"><?php  echo $channel['ten_channel'] ?></span>
                </div>
                <div class="row">
                    <?php

                        $query = "select video.id,name_video,channel.ten_channel,luot_xem from video,channel where video.ma_channel = channel.ma_channel and video.ma_channel = '{$channel['ma_channel']}' order by luot_xem limit 0,4";
                        // echo $query."<br>";
                        $result = $conn->query($query);
                        $mang_video = [];
                        if($result->num_rows >0){
                            while ($row = $result->fetch_assoc()) {
                                # code...
                                array_push($mang_video, $row);
                            }
                        }
                        foreach ($mang_video as $video): ?>
                        <?php 
                            $name = explode('_', $video['name_video']);
                            $name = implode(' ', $name);
                            $name = trim( $name,'.mp4');
                        ?>
                        <a href="/video.php?id=<?php echo $video['id'] ?>">
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                <img src="images/image_video.jpg" alt="">
                                <p><b><?php echo $name ?></b></p>
                                <p><?php echo $video['ten_channel'] ?></p>
                                <p><?php echo $video['luot_xem'] ?> Lượt xem</p>
                            </div>
                        </a>
                    <?php endforeach ?>
                </div>
            </div>
            <?php endforeach ?>
            <!--  -->
        </div>
        </div>
    </body>
</html>