<?php 
	session_start();
	require_once '../connect.php';
	
	$id = $_GET['id'];
	$query = "select `unlike` from video where `key` = '{$id}'";
	$result = $conn->query($query);
	$video = $result->fetch_assoc();
	$unlike = $video['unlike'];
	if(empty($_SESSION['email'])){
		echo json_encode(['unlike' => $unlike]);
		exit();
	}
	$unlike++;

	$query = "update video set `unlike` = '{$unlike}' where `key` = '{$id}'";
	$conn->query($query);
	echo json_encode(['unlike' => $unlike]);
	
 ?>