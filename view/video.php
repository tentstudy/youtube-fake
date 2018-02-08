<?php 
	
	$id = $_GET['id'];
	$query = "select video.id,name_video,channel.ten_channel,ngay_dang,luot_xem from video,channel where video.ma_channel = channel.ma_channel and video.id = '{$id}'";
	// echo $query;
	$result = $conn->query($query);
	if($result->num_rows == 0){
		echo "k cos link ddaua ddwngf timf";exit();
	}
	$video = $result->fetch_assoc();
	$name = explode('_', $video['name_video']);
	$name = implode(' ', $name);
	$name = trim( $name,'.mp4');

	date_default_timezone_set("Asia/Ho_Chi_Minh");
	$date = $video['ngay_dang'];
	$muoth = intval(date("m",strtotime($date)));
	$day = intval(date("d",strtotime($date)));
	$year = intval(date("y",strtotime($date)));

	$count_view =  $video['luot_xem'] + 1;
	$query = "update video set luot_xem = {$count_view} where `id` = '{$id}'";
	$conn->query($query);

	$query = "select count(*) as `like` from `like` where video_id = ${id} and status = 1";
	$result = $conn->query($query);
	$like = $result->fetch_assoc()['like'];

	$query = "select count(*) as `unlike` from `like` where video_id = ${id} and status = -1";
	$result = $conn->query($query);
	$unlike = $result->fetch_assoc()['unlike'];
 ?>

<link rel="stylesheet" href="/css/video.css">
<link rel="stylesheet" href="../vendor/DPlayer/DPlayer.min.css">
<div id="dplayer"></div>
<script src="../vendor/DPlayer/DPlayer.min.js"></script>


<div class="info-video">
	<div class="name-video">
		<span><?php echo $name  ?></span>
	</div>
	<div class="infomation-video">
		<div class="views pull-left">
			<span><?php echo $count_view ?> Lượt xem</span>
		</div>
		<div class="custom-video pull-right">
			<div class="like pull-left nut ">
				<button class="btn-like">
					<i class="material-icons">thumb_up</i>
					<span id="like"><?php echo $like ?></span>
				</button>
			</div>
			<div class="unlike pull-left nut">
				<button class="btn-unlike">
					<i class="material-icons">thumb_down</i>
					<span id= "unlike"><?php echo $unlike ?></span>
				</button>
			</div>
			<div class="share pull-left">
					<a href="#" onclick='window.open("https://www.facebook.com/share.php?u=http://youtube.oo/video.php?id=<?php echo $id ?>", "myWindow", "width=300px, height=700px")'>
					<button class="btn-share">
						<i class="fa fa-share"></i>
						<span>Chia sẻ</span>
					</button>
				</a>
			</div>
		</div>
	</div>
	<div class="flag-like-unlike clearfix">
	</div>
</div>
<div class="info-channel">
	<div class="avatar pull-left">
		<img src="../images/user.jpg" alt="">
	</div>
	<div class="infomation-channel pull-left">
		<div class="name-channel">
			<span><?php echo $video['ten_channel'] ?></span><br>
			<span class="publish">Xuất bản <?php echo  $day ?> thg <?php echo $muoth ?>, <?php echo $year ?></span>
		</div>
	</div>
</div>
<script>
	var dp = new DPlayer({
	    container: document.getElementById('dplayer'),
	    screenshot: true,
	    autoplay: true,
	    video: {
	        url: '/store/<?php echo $video['name_video'] ?>',
	        thumbnails: 'thumbnails.jpg',
	        defaultQuality: 0,
	       	customType: {
	            'customHls': function (video, player) {
	                const hls = new Hls();
	                hls.loadSource(video.src);
	                hls.attachMedia(video);
	            }
	        }
		}
	});
</script>
<script>var id = '<?php echo $id; ?>';</script>
<script>
	$(document).ready(function(){
		$('.btn-like').click(function(){
			$.get('/api/like.php', {id: id, status: 1}, function(res) {
				res = JSON.parse(res);
				$('#like').text(res.like);
				$('#unlike').text(res.unlike);
			})
		});
		$('.btn-unlike').click(function(){
			$.get('/api/like.php', {id: id, status: -1}, function(res) {
				console.log(res);
				res = JSON.parse(res);
				$('#like').text(res.like);
				$('#unlike').text(res.unlike);
			})
		});
	});
</script>