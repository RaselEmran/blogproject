<?php
    
     error_reporting(0);
     //must login...

    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: index.php');
    }
//logout and destroy session...
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header("location: adminLogin.php");
    }

?>


 <aside class="main_sidebar">
        <ul>
            <!-LOAD page in side>

            <li class="active"><i class="fa fa-arrows"></i><a href="? public=registratedUser.php">User List</a></li>
            <li><i class="fa fa-battery-2"></i><a href="? public=sliderup.php">Slider_section</a></li>
            <li ><i class="fa fa-bell"></i><a href="? public=userPost.php">PostDetails</a></li>
            <li><i class="fa fa-bicycle"></i><a href="? public=addcategory.php">AddCategory</a></li>
            <li><i class="fa fa-circle"></i><a href="?public=Commentbox.php">CommentBox</a></li>
            
            <li><i class="fa fa-folder"></i><a href="#">folder</a></li>
            <li> <a  class="dropdown-item" href="adminpanel.php?logout='1'" style="color: red;">logout</a></li>
        </ul>
    </aside>