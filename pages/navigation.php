
<?php 
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: index.php");
  }
?>
    <nav class="main-nav navbar navbar-expand-lg navbar navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="" width="80px" height="40px"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto " id="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="? public=main">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="? public=about">About us</a>
                        </li>
                          <li class="nav-item">
                            <a class="nav-link" href="? public=contactus">Contact us</a>
                        </li>
                          <li class="nav-item">
                            <a class="nav-link" href="? public=about">Terms</a>
                        </li>


                        <?php if( isset($_SESSION['username']) && !empty($_SESSION['username']) )
                        //if session is okkk.. and not empty...
                    {
                        if(isset($_SESSION['username']))
                        {
                           $user = $_SESSION['username'];
                           $query = "SELECT * FROM user_regi WHERE username='$user'";
                           $result = mysqli_query($conn,$query);
                           $rowcount = mysqli_num_rows($result);
                        for ($i=1; $i <=$rowcount ; $i++) 
                        {
                           $row = mysqli_fetch_assoc($result);
                     ?>
                <div class="view-img">
                  <img class="rounded-circle" width="50px"src="pages/<?php echo $row["path"]  ?>" alt="" >
              </div>
                 <div class="dropdown">
                 <a class=" nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo $row['username']   ?>
                 </a>

              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="userView.php">View Profile</a>
                <a class="dropdown-item" href="pages/edituser.php">Update Profile</a>
                   <a class="dropdown-item" href="users/addpost.php">Add Post</a>
                <a  class="dropdown-item" href="index.php?logout='1'" style="color: red;">logout</a>
             </div>
         </div>
    <?php }}}else{

    //not okkk and empty.. ?>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/regi.php">Sign Up</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="pages/login.php">Login</a>
                        </li>
       <?php } ?>
                       
             
                       
                    </ul>

                </div>
            </div>
        </nav>