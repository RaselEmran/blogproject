<?php require_once('../conn/config.php'); 

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
    	.form-control{
        height: 40px;
        box-shadow: none;
        color: #969fa4;
    }
    .form-control:focus{
        border-color: #5cb85c;
    }
    .form-control, .btn{        
        border-radius: 3px;
    }
    .signup-form{
        width: 400px;
        margin: 0 auto;
        padding: 30px 0;
    }
    .signup-form h2{
        color: #636363;
        margin: 0 0 15px;
        position: relative;
        text-align: center;
    }
    .signup-form h2:before, .signup-form h2:after{
        content: "";
        height: 2px;
        width: 30%;
        background: #d4d4d4;
        position: absolute;
        top: 50%;
        z-index: 2;
    }   
    .signup-form h2:before{
        left: 0;
    }
    .signup-form h2:after{
        right: 0;
    }
    .signup-form .hint-text{
        color: #999;
        margin-bottom: 30px;
        text-align: center;
    }
    .signup-form form{
        color: #999;
        border-radius: 3px;
        margin-bottom: 15px;
        background: #f2f3f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .signup-form .form-group{
        margin-bottom: 20px;
    }
    .signup-form input[type="checkbox"]{
        margin-top: 3px;
    }
    .signup-form .btn{        
        font-size: 16px;
        font-weight: bold;      
        min-width: 140px;
        outline: none !important;
    }
    .signup-form .row div:first-child{
        padding-right: 10px;
    }
    .signup-form .row div:last-child{
        padding-left: 10px;
    }       
    .signup-form a{
        color: #fff;
        text-decoration: underline;
    }
    .signup-form a:hover{
        text-decoration: none;
    }
    .signup-form form a{
        color: #5cb85c;
        text-decoration: none;
    }   
    .signup-form form a:hover{
        text-decoration: underline;
    }
    .error {

  color: #a94442; 
  background: #f2dede; 
  border-radius: 5px; 
  text-align: left;
}
    </style>
</head>
<body>
		<?php
	//define empty variable........
	session_start();
	$first_name = $last_name = $username = $email = $password = $confirm_password =  $gender = $check = $final="";
	$first_err = $last_err = $user_err = $email_err = $password_err = $confirm_err = $match_err =  $gender_err = $check_err = $file_err ="";
	$nameOutput = $emailOutput ="";

	//check if user click submit button....
  if(isset($_POST["submit"]))
  {

  	

     if(empty($_FILES["file"] ["name"]))
   {
   	$file_err ="file required";
   }
   else{
   	 $file = $_FILES["file"] ["name"];
    $tmp_name = $_FILES["file"] ["tmp_name"];

    $fileExt = explode('.', $file);
    $filAcutalExt = strtolower(end($fileExt));
    $new_file = uniqid(). '.'.$filAcutalExt;
    $path = "uploads/" .$new_file;
    $allowed = array("jpg", "jpeg", "png", "gif");
    if (!in_array($filAcutalExt, $allowed)) 
   {
   	 $file_err ="only image file is uploaded";
   }
   }


   


  	// check first name is empty or not...
  if(empty($_POST["first_name"]))
  {
  	$first_err ="First Name is required";
  }
  else {
  	$first_name = varify($_POST["first_name"]);
  
  }
  // check pattern match...
   if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
           $first_err = "Only  Letter and white space are allowed";
        }

//check last name is empty or not.....
        if(empty($_POST["last_name"]))
  {
  	$last_err ="Last Name is required";
  }
  else {
  	$last_name = varify($_POST["last_name"]);
  
  }
  //check pattern match...
   if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
           $last_err = "Only Letter and white space are allowed";
        }

//check user name is empty or not....
                if(empty($_POST["username"]))
  {
  	$user_err ="User Name is required";
  }
  else {
  	$username = varify($_POST["username"]);
  
  }
  //check pattern match...
   if (!preg_match("/^[a-zA-Z][a-zA-Z0-9-_\.]{1,15}$/",$username)) {
           $user_err = "First Letter must be character and max length 15";
        }
        //check email is empty or not....
     
             if(empty($_POST["email"]))
  {
  	$email_err ="Email is required";
  }
  else {
  	$email = varify($_POST["email"]);
  	  //check pattern match...
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
           $email_err = "email adress is not valid";
        }
  
  }
  //check password is empty or not...
  if(empty($_POST["password"]))
  {
  	$password_err ="password is required";

  }
  else{
  		$password = varify($_POST["password"]);
  	}
//check confirm password is empty or not....
  if(empty($_POST["confirm_password"]))
  {
  	$confirm_err ="confirm password is required";
  }
  else{
  	$confirm_password =varify($_POST["confirm_password"]);

  }
  //check two password are match or not....
  if($password != $confirm_password )
  {
    $match_err ="Password is not match";
  }
  //check password length....
  if(strlen($password)<6 )
  {
  	$match_err ="password is too short";
  }
  //check gendar part is empty or not...
  if (empty($_POST["gender"])) {
        $gender_err = "Gendar field is required";
    } else {
        $gender = varify($_POST["gender"]);
    }
//check checkbox is empty or not ...
     if (empty($_POST["checke"])) {
        $check_err = "required";
    } else {
        $check = varify($_POST["checke"]);
    }
//check username or email is already used in database or not.....
 $user_check_query = "SELECT * FROM user_regi WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);

   if ($user) { // if user exists
    if ($user['username'] === $username) {
 $user_err ="Username is already exist";
    }

    if ($user['email'] === $email) {//if email exists..
     $email_err = "Email is already exist";
    }
  }
  //all error are empty or not if error zero then insert query done...
   if ($first_err == "" && $last_err == "" && $user_err == "" &&  $email_err =="" && $password_err =="" && $gender_err  =="" && $check_err == "" && $file_err == "") 
   {
    move_uploaded_file($tmp_name, $path);
   $query = "INSERT INTO user_regi (firstname, lastname, username,email,password,gander,trem,path) 
  			  VALUES('$first_name', '$last_name', '$username','$email','$password','$gender','$check','$path')";
  	$final = mysqli_query($conn, $query);
  	//username store in session variable....
  	$_SESSION['username'] = $username;
  	$_SESSION['email'] = $email;
  	$_SESSION['success'] = "You are now logged in";
  	

   }

  }
//this funtion is varify to input data...
function varify($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

	?>
<div class="signup-form">
    <form action="" method="post" enctype="multipart/form-data">
		<h2>Register</h2>
		<p class="hint-text">Create your account. It's free and only takes a minute.</p>
        <div class="form-group">
			<div class="form-row">
				<div class="form-group col-md-6"><input type="text"class="form-control" placeholder="First Name" name="first_name" value="<?php echo $first_name;?>"><span class="error"><?php echo $first_err;?></span>
					
				</div>
				<div class="form-group col-md-6"><input type="text" class="form-control" name="last_name" placeholder="Last Name" value="<?php echo $last_name;?>"><span class="error"><?php echo $last_err;?></span>

				</div>
			</div>        	
        </div>
         <div class="form-group">
        	<input type="text" class="form-control" name="username" placeholder="Usernmae" value="<?php echo $username;?>">
        	<span class="error"><?php echo $user_err;?></span>
        </div>
        <div class="form-group">
        	<input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $email;?>" >
        	<span class="error"><?php echo $email_err;?></span>
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" >
            	<span class="error"><?php echo $password_err;?></span>
            		<span class="error"><?php echo $match_err;?></span>
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
            <span class="error"><?php echo $confirm_err ;?></span>
        </div>
         <div class="form-group">
		<div class="form-check form-check-inline">
  		 <input class="form-check-input" type="radio" name="gender"
        <?php if (isset($gender) && $gender=="female")
        echo "checked";?> value="female">
 			 <label class="form-check-label" for="inlineCheckbox1">Female</label>

		</div>
		<div class="form-check form-check-inline">
  		<input class="form-check-input" type="radio" name="gender"
        <?php if (isset($gender) && $gender=="male")
        echo "checked";?> value="male">
 			 <label class="form-check-label" for="inlineCheckbox2">Male</label>

		</div>
		<div>
			  <span class="error"><?php echo $gender_err;?></span>
		</div>
		</div>
		<input type = "file" name = "file">
          <span class="error"><?php echo $file_err;?></span>

        <div class="form-group">
			<label class="checkbox-inline"><input type = "checkbox" name = "checke"<?php if (isset($check) && $check=="yes")
        echo "checked";?> value = "yes"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
			<span class="error"><?php echo  $check_err;?></span>
		</div>
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Register Now</button>
        </div>
        <?php
        if($final)
  	{
  		?>
          <div class="alert alert-success" role="alert">
 You are registated Successfuly....
</div>
  		<?php

  	
  	}
    
?>
    </form>
	<div class="text-center" style="color: blue">Already have an account? <a href="login.php" style="color: red">Sign in</a></div>
	<?php
echo $nameOutput ;
 echo $emailOutput;

	?>


</div>


 <script src="../js/jquery.min.js"></script>
 <script src="../js/bootstrap.min.js"></script>	
</body>
</html>