<?php

if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: index.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title> Slider Title</title>
</head>
<body>
  <div class="container jumbotron">
    <?php
  $ss ="SELECT * FROM slider WHERE id='1'";
  $rr =mysqli_query($conn,$ss);
  foreach ($rr as $key => $value) {
    # code...
  }


  ?>
  <?php
  $title1_err ="";
  if (isset($_POST["submit1"])) {
    if (empty($_POST["title1"])) {
     $title1_err ="You are Missing Title";
    }
    else{
    $title1 = $_POST["title1"];
  }
  if ($title1_err =="") {
   $up1 ="UPDATE slider SET title = '$title1' WHERE id='1'";
   mysqli_query($conn,$up1);
  }
  }

  ?>
  <form action="" method="post">
      <div class="form-group">
    <label for="exampleInputEmail1">First Image Title</label>
    <input type="text" class="form-control" name="title1" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $value['title'] ?>">
    <span><?php echo $title1_err ?></span>
    <button type="submit" class="btn btn-primary btn-lg btn-block my-2" name="submit1">Update1</button>
    
  </div>
  </form>
  <!-seconnnd  !>
    <?php
  $ss ="SELECT * FROM slider WHERE id='2'";
  $rr =mysqli_query($conn,$ss);
  foreach ($rr as $key => $value) {
    # code...
  }


  ?>
  <?php
  $title1_err ="";
  if (isset($_POST["submit2"])) {
    if (empty($_POST["title2"])) {
     $title1_err ="You are Missing Title";
    }
    else{
    $title2 = $_POST["title2"];
  }
  if ($title1_err =="") {
   $up1 ="UPDATE slider SET title = '$title2' WHERE id='2'";
   mysqli_query($conn,$up1);
  }
  }

  ?>
  <form action="" method="post">
      <div class="form-group">
    <label for="exampleInputEmail1">Second Image Title</label>
    <input type="text" class="form-control" name="title2" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $value['title'] ?>">
    <span><?php echo $title1_err ?></span>
    <button type="submit" class="btn btn-primary btn-lg btn-block my-2" name="submit2">Update2</button>
    
  </div>
  </form>
  <!-third--!>
      <?php
  $ss ="SELECT * FROM slider WHERE id='3'";
  $rr =mysqli_query($conn,$ss);
  foreach ($rr as $key => $value) {
    # code...
  }


  ?>
  <?php
  $title1_err ="";
  if (isset($_POST["submit3"])) {
    if (empty($_POST["title3"])) {
     $title1_err ="You are Missing Title";
    }
    else{
    $title3 = $_POST["title3"];
  }
  if ($title1_err =="") {
   $up1 ="UPDATE slider SET title = '$title3' WHERE id='3'";
   mysqli_query($conn,$up1);
  }
  }

  ?>
  <form action="" method="post">
      <div class="form-group">
    <label for="exampleInputEmail1">Third Image Title</label>
    <input type="text" class="form-control" name="title3" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $value['title'] ?>">
    <span><?php echo $title1_err ?></span>
    <button type="submit" class="btn btn-primary btn-lg btn-block my-2" name="submit3">Update2</button>
    
  </div>
  </form>
  </div>

</body>
</html>