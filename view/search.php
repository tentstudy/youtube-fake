
<div class="container2">
    <?php foreach ($mang_video as $video): ?>
        <?php 
            $name = explode('_', $video['name_video']);
            $name = implode(' ', $name);
            $name = trim( $name,'.mp4');
        ?>
        <a href="/video.php?id=<?php echo $video['id'] ?>">
            <div class="video">
                <div class="image pull-left">
                    <img src="../images/image_video.jpg" alt="">
                </div>
                <div class="info pull-left">
                    <p class="name-video" style="font-size: 20px;"><?php echo $name; ?></p>
                    <p class="channel" style="font-size: 16px;"><?php echo $video['email'] ?></p>
                    <p class="views" style="font-size: 16px;"><?php echo $video['luot_xem'] ?></p>
                </div>
            </div>
        </a>
    <?php endforeach ?>
</div>
<div class="page clearfix" style="width: 200px; margin: 0 auto; font-size: 20px;">
        <?php for ($i=1; $i <= ceil($total / $videoPerPage)  ; $i++) { 
            # code...
            echo '<a href="?search='.$search.'&page='.$i.'" class="btn">'.$i.'</a>';
        } ?>
    </div>