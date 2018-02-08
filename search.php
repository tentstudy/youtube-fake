<?php 
   session_start();
    require_once 'connect.php';
    if(isset($_REQUEST['search'])){
        $search = $_REQUEST['search'];
        if (!empty($search)) {
            $string = $_GET['search'];
            $page = $_GET['page'] ?? 1;
            $videoPerPage = 4;
            $start = ($page - 1)* $videoPerPage;
            $end = $start + $videoPerPage;
            $string = str_replace(' ', '%', $string);
            $string = "%".$string."%";
            $query = "select * from video where name_video like '{$string}' order by video.luot_xem  DESC limit {$start},{$end}";
            $result = $conn->query($query);
            $mang_video= [];
            if($result->num_rows>0){
                while ($row = $result->fetch_assoc()) {
                    # code...
                    array_push($mang_video, $row);
                }
            }
            $query = "select count(*) as totalvideo from video where name_video like '{$string}'";
            $result = $conn->query($query); 
            $total = $result->fetch_assoc()['totalvideo'];
        }
    }
?>
<html>

<head>
    <title>YouTube</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once __DIR__ . '/view/css.php'; ?>
    <?php require_once __DIR__ . '/view/js.php'; ?>
    <!-- <link rel="stylesheet" type="text/css" href="/css/index.css"> -->
    <link rel="stylesheet" href="../css/search.css">
</head>

<body>
    <?php require_once __DIR__ . '/view/navbar.php'; ?>
    <div id="content">
        <?php require_once __DIR__ . '/view/search.php'; ?>     
    </div>
</body>
</html>