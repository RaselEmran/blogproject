
<?php require_once('../conn/config.php'); 
session_start();
if (isset($_SESSION['username'])) {
  header('location: ../index.php');
}
  ?>
<!DOCTYPE html>
<html>
<head>

<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
<style>
    * {
  margin: 0px;
  padding: 0px;
}
body {
  font-size: 120%;
  background: #F8F8FF;
}

.header {
  width: 30%;
  margin: 50px auto 0px;
  color: white;
  background: #5F9EA0;
  text-align: center;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 20px;
}
form, .content {
  width: 30%;
  margin: 0px auto;
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 0px 0px 10px 10px;
}
.input-group {
  margin: 10px 0px 10px 0px;
}
.input-group label {
  display: block;
  text-align: left;
  margin: 3px;
}
.input-group input {
  height: 30px;
  width: 93%;
  padding: 5px 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid gray;
}
.btn {
  padding: 10px;
  font-size: 15px;
  color: white;
  background: #5F9EA0;
  border: none;
  border-radius: 5px;
}
.error {

  color: #a94442; 
  background: #f2dede; 
  border-radius: 5px; 
  text-align: left;
}
.success {
  color: #3c763d; 
  background: #dff0d8; 
  border: 1px solid #3c763d;
  margin-bottom: 20px;
}
</style>
</head>
<body>
<?php
    //define empty variable........

    $username =  $password = "";
  $user_err = $password_err =  $match_err = "";
  

    //check if user click submit button....
  if(isset($_POST["login_user"]))
  {
  

//check user name is empty or not....
                if(empty($_POST["username"]))
  {
    $user_err ="User Name is required";
  }
  else {
    $username = varify($_POST["username"]);
  
  }


  if(empty($_POST["password"]))
  {
    $password_err ="password is required";

  }
  else{
        $password = varify($_POST["password"]);
    }
    //if error message is zero then select quiery done....

   if ( $user_err == "" && $password_err =="") 
   {

        $query = "SELECT * FROM user_regi WHERE username='$username' AND password='$password'";
        $results = mysqli_query($conn, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: ../index.php');
    }else {
       $match_err ="worng password and username";
    }
    

   }

  }

function varify($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

    ?>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="">
  	
  	<div class="input-group form-group">
  		<label>Username</label>
  		<input type="text" name="username" >
        <span class="error"><?php echo  $user_err;?></span>
  	</div>
  	<div class="input-group form-group">
  		<label>Password</label>
  		<input type="password" name="password">
        <span class="error"><?php echo  $password_err;?></span>
  	</div>
  	<div class="input-group form-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
         <a class="ml-auto pr-4" href="#" class="pull-right">Forgot Password?</a>
  	</div>
      <span class="error"><?php echo  $match_err;?></span>
  
  	<p>
  		Not yet a member? <a href="regi.php">Sign up</a>
  	</p>
  </form>

  <script src="../js/jquery.min.js"></script>
 <script src="../js/bootstrap.min.js"></script> 
</body>
</html>