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
  <title>Document</title>
</head>
<body>
  <?php
  //userdetails
  //user id get by url....

$id = $_GET['id'];
$select = "SELECT * FROM user_regi WHERE id ='$id'";
$query = mysqli_query($conn,$select);
?>
 <div class="table-responsive">  
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Firstnmae</th>
      <th scope="col">LastName</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
       <th scope="col">Gander</th>
    </tr>
  </thead>



<?php
foreach ($query as $key => $value) {
  //user img and information....
  ?>

     <img class="rounded mx-auto d-block img-thumbnail" width="100px"src="../pages/<?php echo $value["path"]  ?>" alt="" >
     <tbody>
    <tr>
      <th scope="row"><?php echo $value["id"]  ?></th>
      <td><?php echo $value["firstname"]  ?></td>
       <td><?php echo $value["lastname"]  ?></td>
      <td><?php echo $value["username"]  ?></td>
       <td><?php echo $value["email"]  ?></td>
        <td><?php echo $value["password"]  ?></td>
         <td><?php echo $value["gander"]  ?></td>
    </tr>
</tbody>


  <?php
  //user id store in ....variable then select this id to get data in post table..
  $userid = $value["id"];
}
?>
</table>
</div>
<!-End user_details   -!>
<div class="py-3 my-3 text-center">
  <h4>Uploaded Post By <b><?php echo $value["username"]?></b></h4>
</div>
<?php
//select post table match by id.....
$ss = "SELECT * FROM post WHERE user_id ='$userid'";
$result = mysqli_query($conn,$ss);



?>

<div class="container">    

                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr >  
                                    <td>Title</td>  
                                    <td>time</td>  
                                    
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                             ?>
                             <tr class="bg-success">
                              <td><?php echo $row["title"] ?></td>
                              <td><?php echo $row["time"] ?></td>
      
                             </tr>
                             <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  



<script src="js/jquery.min.js"></script>
  
  <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script> 
  
</body>
</html>