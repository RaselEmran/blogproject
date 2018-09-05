<?php
//admin must login...
if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: index.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Addcategory</title>
	<style>
		.error{
			margin-top: 50px;
			padding: 5px 0;
			color: #f00123;
			background-color: #002563;
			text-align: center;
		}
	</style>
</head>
<body>
	<?php
	//declere variable...
	$error = $all_err= $insertinfo ="";
	if (isset($_POST["submit"])) {
		//cheack empty field...
		if (empty($_POST["name"])) {
			$error= "You are missing Category";

		}
		//if not empty then collect data...
		else
		{
			$a =$_POST["name"];
			//check this data is already in database or not...
			$select ="SELECT * FROM category WHERE name='$a' LIMIT 1";
		$result =mysqli_query($conn,$select);
		$final = mysqli_fetch_assoc($result);
		if($final)
		{
			//if this data is allredy store database..
			if($final['name']===$a)
			{
				$all_err="This Category Name is already exist";
			}
		}
		//if no error are occour...

		}
		if($error =="" && $all_err =="")

		{
			//then inserted.....
					$insert ="INSERT INTO category(name)VALUES('$a')";
		$insertinfo = mysqli_query($conn,$insert);

		}

		
	}
	


	?>
	
<div class="jumbotron mb-4">
	<h2 class="text-center">Added Post Category..</h2>
	<form  action="" method="post">
		<div class="form-group">
		<input type="text" class="form-control" name="name"> 
	
			</div>
		<input type="submit" class="btn btn-secondary btn-lg btn-block mb-3" name="submit" value="submit">
			<span class="error"><?php echo $error  ?></span>
			<span class="error"><?php echo $all_err  ?></span>
	</form>
	<?php
 if ($insertinfo) {
 	?>
 	<div class="alert alert-primary" role="alert">
  Category Added succesfully
</div>

 	<?php
 }

	?>
</div>
	
</body>
</html>