<?php
if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: index.php');
    }
include_once 'connection.php';
//get id by post approve in url..
$id = $_GET["id"];
$sq = "UPDATE post SET status ='no' WHERE id=$id";
if (mysqli_query($conn,$sq)) {
	header("location: adminpanel.php?public=userPost.php");
}
$comment_id = $_GET["unseen"];
//then update ....
$sql = "UPDATE contact SET status ='no' WHERE id=$comment_id";
if (mysqli_query($conn,$sql)) {
	header("location: adminpanel.php?public=commentbox.php");
}

?>