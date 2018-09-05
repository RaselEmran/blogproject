<?php
require_once('connection.php');
if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: index.php');
    }
    //user data delete....
$id = $_GET['id'];
$DelSql = "DELETE FROM user_regi WHERE id='$id'";
$res = mysqli_query($conn, $DelSql);
if($res){
	header('location: adminpanel.php?public=registratedUser.php');
}else{
	echo "Failed to delete";
}
?>
<?php
//post data delete....
$delete = $_GET["delete"];
$DeleteSql = "DELETE FROM post WHERE id='$delete'";
$result = mysqli_query($conn, $DeleteSql);
if($result){
	header('location: adminpanel.php?public=Userpost.php');
}else{
	echo "Failed to delete";
}




?>
<?php
//contact data delete ....
$comment_delete = $_GET["comment"];
$comment_DeleteSql = "DELETE FROM contact WHERE id='$comment_delete'";
$comment_result = mysqli_query($conn, $comment_DeleteSql);
if($comment_result){
	header('location: adminpanel.php?public=commentbox.php');
}else{
	echo "Failed to delete";
}




?>