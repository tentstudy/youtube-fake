<?php
require_once 'connect.php';
session_start();
function generateRandomString($length = 8)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
if (isset($_POST['btn-upload-1'])) {
    if (!empty($_SESSION['email'])) {
        if (isset($_FILES['video'])) {
            if ($_FILES['video']['error'] > 0) {
                $error = 'Upload Bị Lỗi';
            } else {
                // Upload file
                $email = $_SESSION['email'];
                $file_name = $_FILES['video']['name'];
                // $id_video = generateRandomString();
                // $query = "select id_video from video where `key` = '{$id_video}'";
                // // echo $query;
                // while (true) {
                //     $result = $conn->query($query);
                //     if ($result->num_rows > 0) {
                //         $id_video = generateRandomString();
                //         $query = "select id_video from video where id_video = '{$id_video}'";
                //     } else break;
                // }

                $query = "INSERT INTO video (email, name_video) values ('{$email}','{$file_name}')";
                $result = $conn->query($query);
                if ($result) {
                    move_uploaded_file($_FILES['video']['tmp_name'], 'store/' . $file_name);
                    $tb = "Đã tải file lên thành công!";
                }
            }
        } else {
            $error = "File chưa được chọn";
        }
    } else {
        $error = "Bạn chưa đăng nhập";
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
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <!-- <link rel="stylesheet" type="text/css" href="/css/index.css"> -->
    <link rel="stylesheet" href="css/upload.css">
    <style>

    </style>
</head>

<body>
    <?php require_once __DIR__ . '/view/navbar.php'; ?>

    <div>
        <?php require_once __DIR__ . '/view/sidebar.php'; ?>
        <div id="content">
            <?php
            if (isset($error)) {
                echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
            }
            ?>
            <?php
            if (isset($tb)) {
                echo '<div class="alert alert-success">' . $tb . '</div>';
            }
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="uploadfile">
                	<div id="previewvideo" style="display: none;" >
            			<video style="width: 350px"></video>
            			<div id="video-name"></div>
            			<div>
            				<button type="submit" id="btn-upload-1" class="btn btn-primary" name="btn-upload-1">Submit</button>
            				<label  for="file" class="btn btn-default" >Chon video khac</button>
            			</div>
            		</div>
                	<label for="file" id="imgUpload">
                    		<i  class="material-icons" style="font-size: 200px;">backup</i>
                        <br>
                        <span>Chọn tệp để tải lên</span>
                    </label>
					<input type="file" id="file" class="hidden" name="video">
                </div>
                
            </form>

        </div>
    </div>
    <script>

    	function bytesToSize(bytes) {
		   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
		   if (bytes == 0) return '0 Byte';
		   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
		   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
		};

    	function loadVideo(video) {

    		if (!video.type.includes('video')) {
    			alert('Invalid video')
    			return
    		}
    		console.log(video)
    		var reader = new FileReader();

			reader.readAsDataURL(video);

    		reader.onload = function(event) {
            	$('#imgUpload').hide()
              	$('#previewvideo video').attr('src', event.target.result);
              	$('#previewvideo #video-name').text(video.name + ' - ' + bytesToSize(video.size))
            	$('#previewvideo').show()
            }
    	}

        $(document).ready(function () {

        	$('#file').on('change', function(e) {
        		var file = e.target.files[0];
    			loadVideo(file);
        	})

            $('#content').on("dragover", e => e.preventDefault());
            $('#content').on("drop", (e) => {
            	e = e.originalEvent
                e.preventDefault();

                var video = e.dataTransfer.files[0]

                loadVideo(video)

                
            })
        })
    </script>
</body>
</html>