<?php 
    session_start();
    require_once 'connect.php';
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
    <style>
        .left{
            width: 60%;
            padding-left: 10px;
            height: 100%;
        }
        .right{
            width: 40%;
            padding-left: 30px;
        }
        @media only screen and (max-width: 1200px){

            #content{
                width: 80%;
                margin: 0 auto;
            }
            .left{
                width: 100%;
            }
            .right{
                width: 80%;
                padding-left: 0px;
            }
        }
    </style>
</head>

<body>
    <?php require_once __DIR__ . '/view/navbar.php'; ?>

    <div style="max-width: 1400px; margin: 0 auto">
        <?php require_once __DIR__ . '/view/sidebar.php'; ?>
        <div id="content">
            <div class="row">
                <div class="left pull-left ">
                    <?php require_once __DIR__ . '/view/video.php'; ?>
                </div>
                <div class="right pull-left clearfix">
                    <?php require_once __DIR__ . '/view/next.php'; ?>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/autoplay.js"></script>
</html>