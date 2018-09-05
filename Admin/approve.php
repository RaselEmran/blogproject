<?php
//must login...
if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: index.php');
    }
include_once 'connection.php';
//get data by url in approve field...
$id = $_GET["id"];
//then update ....
$sq = "UPDATE post SET status ='yes' WHERE id=$id";
if (mysqli_query($conn,$sq)) {
	header("location: adminpanel.php?public=userPost.php");
}

?>
<?php
//get data by url in approve field...by commentbox page...
$comment_id = $_GET["seen"];
//then update ....
$sql = "UPDATE contact SET status ='yes' WHERE id=$comment_id";
if (mysqli_query($conn,$sql)) {
	header("location: adminpanel.php?public=commentbox.php");
}



?>