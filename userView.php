<?php 

require_once('conn/config.php'); 
session_start();

if(!isset($_SESSION['username']))
{
	header("location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Userview</title>
	    <meta name="viewport" content="width=device-width, initial-sca1">
          <link rel="stylesheet" href="css/bootstrap.min.css">
<style>
	body{
		padding: 0;
		margin: 0;
	}
	.wellcome{
		text-align: center;
		padding: 10px 0;
	}
</style>
</head>
<body>
	<header>
		   <?php include_once 'pages/navigation.php'  ?>
	</header>
   <div class="container">
   	<div>
   			<div class="wellcome">
	<h4>Wellcome <?php 	echo $_SESSION['username'];    ?> to visit our site...</h4>
</div>
<?php
if (isset($_SESSION['username'])) {
	$user = $_SESSION['username'];
	$sql = "SELECT * FROM user_regi WHERE username='$user'";
	$result = mysqli_query($conn,$sql);
	?>
	




	<?php
	foreach ($result as  $value) {
		?>
	   <div class="py-4">
	   		<img class="img-thumbnail rounded mx-auto d-block" width="150px" src="pages/<?php echo $value['path']   ?>" alt="">
	   </div>
			<div class="row">
  <div class="col-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Firstname</a>
      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Lastname</a>
      <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Lastname</a>
      <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Email</a>
    </div>
  </div>

<div class="col-9 text-center ">

    <div class="tab-content card-body jumbotron" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"><?php echo $value['firstname'] ?></div>
      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"><?php echo $value['lastname'] ?></div>
      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab"><?php echo $value['username'] ?></div>
      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab"><?php echo $value['email'] ?></div>
    </div>

  </div>
</div>



		<?php
	
	}
}
?>

<div>
	<h3>Updated last post..</h3>
</div>
<?php
$post_id = $value['id'];
$post_s ="SELECT * FROM post  WHERE user_id ='$post_id'ORDER BY id DESC LIMIT 0,15";
$p_result = mysqli_query($conn, $post_s);
?>
<table class="table">

<?php
foreach ($p_result as $P_value) {
?>
<tbody>
    <tr>
      <td class="p-4"><a href="? public=postDatails&id=<?php echo $value['id']?>"><?php echo $P_value['title'] ?></a></td>
      <td><?php echo $P_value['time'] ?></td>
   
    </tr>
   
  </tbody>


<?php
}
?>
</table>

<?php

?>
   	</div>
   </div>







  <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script> 	
</body>
</html>