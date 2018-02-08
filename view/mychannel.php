<link rel="stylesheet" href="../css/mychannel.css">
<div class="container1 clearfix">
	<div class="my-channel">
		<div class="img pull-left">
			<img src="../images/user.jpg" alt="">
		</div>
		<div class="name-channel pull-left">
			<h1><?php echo $email['email']; ?></h1>
		</div>
	</div>
	<div class="list-video clearfix">
		<?php 
			if($result->num_rows==0){
				echo "<div class='alert alert-danger' style='font-size: 20px;'>Bạn chưa có video nào</div>";
			}
		 ?>
		<?php foreach ($mang_video as $video): ?>
		<?php
			$name = explode('_', $video['name_video']);
		    $name = implode(' ', $name);
		    $name = trim( $name,'.mp4');
		?>
			<a href="/video.php?id=<?php echo $video['id'] ?>">
				<div class="video pull-left">
					<div class="image pull-left">
						<img src="../images/image_video.jpg" alt="">
					</div>
					<div class="info pull-left">
						<p class="name-video" style="font-size: 20px;"><?php echo $name ?></p>
						<p class="channel" style="font-size: 16px;"><?php echo $video['email']; ?></p>
						<p class="views" style="font-size: 16px;"><?php echo $video['luot_xem']; ?> Lượt xem</p>
					</div>
				</div>
			</a>
		<?php 	endforeach ?>
	</div>
	<div class="page clearfix" style="width: 500px; margin: 0 auto; font-size: 20px;">
		<?php for ($i=1; $i <= ceil($total / $videoPerPage)  ; $i++) { 
		echo '<a href="?page='.$i.'" class="btn">'.$i.'</a>';
		   } ?>
	</div>
</div>