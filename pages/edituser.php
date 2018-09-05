<?php require_once('../conn/config.php'); 
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../index.php');
  }

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit User</title>
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<style>
			.wrapper{
				max-width: 1000px;
				margin: 15px auto;
				border:2px solid blue;
			}
			.head{
				text-align: center;
				background-color: #262626;
				color: #fff;
				padding: 10px 0;
			}
		</style>
</head>
<body>
	<?php
	if (isset($_SESSION['username']))
	{
		 $userid =$_SESSION['username'];
	}

 $file_err = $msg = $file_size="";

	if(isset($_POST["upload"]))
		
    			{
    				if (empty($_FILES["file"] ["name"])) {
    					 $file_err ="Missing";
    				}
    				else{
    				 $file = $_FILES["file"] ["name"];
    				
             $tmp_name = $_FILES["file"] ["tmp_name"];
             $file_size = $_FILES["file"] ["size"];

             $fileExt = explode('.', $file);
             $filAcutalExt = strtolower(end($fileExt));
             $new_file = uniqid(). '.'.$filAcutalExt;
             $path = "uploads/" .$new_file;
             $allowed = array("jpg", "jpeg", "png", "gif");
             //extantion match...
                      if (!in_array($filAcutalExt, $allowed))
                         {
	                     $file_err ="<div class='alert alert-danger'>
                            Only JPG PNG and GIF image uploaded
                         </div>";
                      }
                }
                if ($file_size>=1000000) {
                	   $file_err ="<div class='alert alert-danger'>
                          File size lower than 1mb
                         </div>";
                }
          //if has ano error...then upload..
          if($file_err == "")
          {
          	move_uploaded_file($tmp_name, $path);
	          $sqlimg = "UPDATE user_regi SET path= '$path' WHERE username='$userid'";
            $msg =  mysqli_query($conn, $sqlimg);
          }
  //end of upload if condition..
    		}


	?>
	
	<div class="container wrapper">
		<div class="head">
		<h3><b>Update your Basic Information and profile image</b></h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data" class="sign">
	<div class="my-4 text-center">
		<input type="file" name="file" class="fileup">
	</div>
	<div class="my-4 text-center">
		<input class="btn-lg btn-block btn-danger" type="submit" name="upload" value="upload">
	</div>
	<span> <?php  echo $file_err; //upload error messege display.. ?></span>
  <?php
  //php
  if($msg)
  {
  //upload successfully messege...
  //end
  ?>
        <div class="alert alert-success" role="alert">
      Image uploaded Succesfuly.
   </div>

  <?php
  //strat php
}


//end php..
?>
</form>
<?php
$showimg ="SELECT * FROM user_regi WHERE username ='$userid'";
$showpic =mysqli_query($conn,$showimg);
foreach ($showpic as $key => $picture) {
	?>
<img class="img-thumbnail rounded mx-auto d-block" width="150px" src="<?php echo $picture['path']   ?>" alt="">
	<?php
}
?>
<form action="" method="post" enctype="multipart/form-data" class="my-4">
	<div class="form-group">
		<input type="text" name="firstname" class="form-control" value="<?php echo $picture['firstname'] ?>">
	</div>
	<div>
		<input type="text" name="lastname" class="form-control" value="<?php echo $picture['lastname'] ?>">
	</div class="form-group">
	<div class="my-4 text-center">
		<input class="btn-lg btn-block btn-primary" type="submit" name="update" value="update">
	</div>

<?php
$final ="";
if (isset($_POST["update"])) {
				   $fname =trim($_POST["firstname"]);
       $lname =trim($_POST["lastname"]);
       $sql = "UPDATE user_regi SET firstname='$fname', lastname=' $lname' WHERE id='$userid'";
       $final =  mysqli_query($conn, $sql);
}
if ($final) {
	echo '<div class="alert alert-primary" role="alert">
  successfully updated
</div>';
}
?>

	</div>
	



 <script src="../js/jquery.min.js"></script>
 <script src="../js/bootstrap.min.js"></script>	
</body>
</html>