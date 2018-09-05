
<?php
include_once 'connection.php';
//admin must login....
session_start();
if (!isset($_SESSION['username'])) {
  header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>admin panel</title>
   
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/design.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">

</head>
<body>
	<div class="wrapper">
	<div class="row ">
		<div class="col-12 col-md-2">
			 <?php 
			 //include sidebar....

			 include_once 'aside.php'
			   ?>
		</div>
		<div class="col-12 col-md-10">
			<div class="mian">
				<?php 
				//load every categoy of page in side...
                  if(isset($_GET["public"]))
                  {
                    if(file_exists($_GET["public"]))
                    {
                          include_once $_GET["public"];
                    }
                    else
                    {
                       include_once '404.php';  
                    }
                  
                  }
                  else
                  {
                     include_once 'registratedUser.php'; 
                  }


                

                    ?> 
			</div>
			
		</div>
	</div>
	</div>



	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-data table script !>
    <script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap4.min.js"></script>	
  

   
	
</body>
</html>