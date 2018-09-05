<?php require_once('../conn/config.php'); 
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../index.php');
  }

  ?>

<!DOCTYPE html>
<html>
 <head>
 <meta charset="utf-8">
 <title>myEditor</title>
 	<link rel="stylesheet" href="../css/bootstrap.min.css">

 </head>
 <body>

 <?php
 error_reporting(0);
 $title = $text =$category = $hidden = "";
 $title_err = $text_err = $category_err ="";
 	if (isset($_POST["submit"])) {
 		if(empty($_POST["title"]))
 		{
 			$title_err ="You are missing Title";
 		}
 		else
 		{
 			$title = varify($_POST["title"]);
 		}
 			if(empty($_POST["myeditor"]))
 		{
 			$text_err ="You are missing Description";
 		}
 		else
 		{
 			$text = varify($_POST["myeditor"]);
      $editor_data_insert = html_entity_decode($text);
 		}
 			if(empty($_POST["category"]))
 		{
 			$category_err ="You are missing category";
 		}
 		else
 		{
 			$category = $_POST["category"];
 		}
 			$hidden = $_POST["hidden"];
      $time =date ("l, d F Y, h:i:s A");

 			 if ($title_err == "" && $text_err == "" && $category_err == "" ) 
 			 {

 		 $sql = "INSERT INTO post(title,description,category_id,user_id,status,time) VALUES('$title','$editor_data_insert','$category','$hidden','no','$time')";
         mysqli_query($conn,$sql);
 			 }
 	}
 	function varify($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if(isset($_SESSION['username']))
{
    	$user = $_SESSION['username'];

        $query = "SELECT * FROM user_regi WHERE username='$user'";
      $result = mysqli_query($conn,$query);
      $rowcount = mysqli_num_rows($result);
        for ($i=1; $i <=$rowcount ; $i++)
        {
        		$row = mysqli_fetch_assoc($result);

        }
}

 ?>
<div>	
<div class="container jumbotron">	
<div class="">	
 <form method="POST" action="">
 	<div class="form-group">
  <label for="exampleInputEmail1">Add Post Title</label>	
<input class="form-control" id="exampleInputEmail1" type="text" name="title" value="<?php echo $title?>"> 
 	</div>
 	<span><?php echo $title_err; ?></span>
  <div class="form-group">
  	 <textarea  name="myeditor" class="ckeditor" rows="10" cols="80" ><?php echo $text  ?> </textarea>


  </div>
 <span><?php echo $text_err; ?></span>
 <div class="form-group">	
	   <select id="inputState" class="form-control" name="category">
        <option value="">Choose Category..</option>
 <?php 
 //option value fetch in data table...
    $category_s = "SELECT * FROM category";
    $cate_result = mysqli_query($conn,$category_s);
    foreach ($cate_result as $value) {
    ?>
 <option <?php if (isset($category) && $category=="'.echo $value[id].'") echo "selected";  ?> value="<?php echo $value["id"] ?>"><?php echo $value["name"] ?></option>

    <?php
    }
     ?>

     

      </select>
 </div>
 	<span><?php echo $category_err; ?></span>
 	<input type="hidden" name="hidden" value="<?php echo $row["id"]; ?>">
 <br>
 <input type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="submit">

 </form>
</div>
</div>

</div>
 <?php 




 ?>



 <script src="../js/jquery.min.js"></script>
 <script src="../js/bootstrap.min.js"></script>	

  <script src="ckeditor/ckeditor.js"></script>
 </body>
</html>
