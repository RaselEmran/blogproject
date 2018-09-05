

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<style>

	</style>
</head>
<body>
  <?php
  $name = $email = $text ="";
  $name_err =$email_err = $text_err ="";

if (isset($_POST["contact"])) {
 if (empty($_POST["name"])) {
  $name_err ="Missing your name";
 }
 else
 {
  $name = mysqli_real_escape_string($conn,$_POST["name"]); 
 }
  if (empty($_POST["email"])) {
  $email_err ="Missing your email";
 }
 else
 {
  $email = mysqli_real_escape_string($conn,$_POST["email"]); 
 }
  if (empty($_POST["textarea"])) {
  $text_err ="Missing your messege";
 }
 else
 {
  $textarea = mysqli_real_escape_string($conn,$_POST["textarea"]); 
 }
 if ($name_err =="" && $email_err =="" && $text_err =="") {
  $insert ="INSERT INTO contact(name,email,messege,status)VALUES('$name','$email','$textarea','no')";
  mysqli_query($conn,$insert);
 }
}


  ?>
	<div class="container">
    <h2 class="text-center">Contac Form</h2>
  <div class="row justify-content-center">
    <div class="col-12 col-md-12 col-lg-12 pb-5">


                    <!--Form with header-->

                    <form action="" method="post">
                        <div class="card border-primary rounded-0">
                            <div class="card-header p-0">
                                <div class="bg-info text-white text-center py-2">
                                    <h3><i class="fa fa-envelope"></i> Contactanos</h3>
                                  
                                </div>
                            </div>
                            <div class="card-body p-3">

                                <!--Body-->
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="nombre" name="name" placeholder="Nombre y Apellido" value="<?php echo $name ?>" >
                                    </div>
                                    <span style="padding: 5px 0; color: red; background-color: #000"><?php echo $name_err ?></span>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                        </div>
                                        <input type="email" class="form-control" id="nombre" name="email" placeholder="example@gmail.com"value="<?php echo $email ?>">
                                    </div>
                                      <span style="padding: 5px 0; color: red;background-color: #000"><?php echo $email_err ?></span>
                                </div>

                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
                                        </div>
                                        <textarea name="textarea" class="form-control" placeholder="Envianos tu Mensaje" ></textarea>
                                    </div>
                                      <span style="padding: 5px 0; color: red; background-color: #000"><?php echo $text_err ?></span>
                                </div>

                                <div class="text-center">
                                    <input type="submit" name="contact" value="submit" class="btn btn-info btn-block rounded-0 py-2">
                                </div>
                            </div>

                        </div>
                    </form>
                    <!--Form with header-->


                </div>
  </div>
</div>
<script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>	
</body>
</html>