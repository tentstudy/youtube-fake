<?php 
	session_start();
	require_once '../connect.php';
	$id = $_GET['id'];
	$status = $_GET['status'];
	$query = "select * from `like` where video_id = {$id} and user_id = {$_SESSION['user_id']}";
	$result = $conn->query($query);
	if($result->num_rows>0){
		$query = "update `like` set status = {$status} where user_id = {$_SESSION['user_id']}";
		$conn->query($query);
	} else {
		$query = "insert into `like` (`user_id`, video_id, status) values ({$_SESSION['user_id']},{$id},{$status}) ";
		echo $query;
		$conn->query($query);
	}
	
	$query = "select count(*) as `like` from `like` where video_id = ${id} and status = 1";
	$result = $conn->query($query);
	$like = $result->fetch_assoc()['like'];

	$query = "select count(*) as `unlike` from `like` where video_id = ${id} and status = -1";
	$result = $conn->query($query);
	$unlike = $result->fetch_assoc()['unlike'];
	echo json_encode(['like' => $like, 'unlike' => $unlike]);
 ?>