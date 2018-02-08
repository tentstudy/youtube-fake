<?php 

	$query = "select video.id,name_video,channel.ten_channel,luot_xem from video,channel order by rand() limit 0,6";
	$result = $conn->query($query);
	$mang_video = [];
	if($result->num_rows > 0){
		while ($rows = $result->fetch_assoc()) {
			# code...
			array_push($mang_video, $rows);
		}
	}
 ?>
<link rel="stylesheet" href="/css/next.css">
<div class="list-video">
	<?php foreach ($mang_video as $value): ?>
	<?php 
		$name = explode('_', $value['name_video']);
        $name = implode(' ', $name);
        $name = trim( $name,'.mp4');
        $name = mb_substr($name, 0, 30);
        $name = $name."...";
    ?>
	<div class="video">
		<a href="/video.php?id=<?php echo $value['id'] ?>">
			<div class="img-next-video pull-left">
				<img src="images/image_video.jpg" alt="" class="img-video">
			</div>
			<div class="info-next-video pull-left">
				<div class="name-video">
					<span><?php echo $name ?></span>
				</div>
				<div class="channel-video">
					<span><?php echo $value['ten_channel'] ?></span>
				</div>
				<div class="views-video">
					<span><?php echo $value['luot_xem'] . ' Lượt xem' ?> </span>
				</div>
			</div>
		</a>
	</div>
	<?php endforeach ?>
</div>