<?php
//get username and id id by post
$user = $_GET["user"];
$id = $_GET["id"];
$select = "SELECT * FROM user_regi WHERE username ='$user'";
$ss = mysqli_query($conn,$select);
?>

 <table class="table">
  <thead class="thead-dark">
    <tr>
  
      <th scope="col">FirstName</th>
      <th scope="col">LastName</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  
<?php
 $rowcount = mysqli_num_rows($ss);
  for ($i=1; $i <=$rowcount ; $i++){
        $r = mysqli_fetch_assoc($ss);
        ?>
        <img class="rounded mx-auto d-block img-thumbnail" width="100px"src="pages/<?php echo $r["path"]  ?>" alt="" >
<tbody>
    <tr>
      <td><?php echo $r["firstname"] ?></td>
      <td><?php echo $r["lastname"] ?></td>
       <td><?php echo $r["username"] ?></td>
        <td><?php echo $r["email"] ?></td>
    </tr>
   
  </tbody>

        <?php

  
}
?>
</table>
<div class="py-3 text-center">
	<h4>Uploaded Post...</h4>
</div>
<?php
//how many post by user...
$p_select = "SELECT * FROM post WHERE user_id ='$id'";
$result = mysqli_query($conn, $p_select);
?>
 <table class="table">
<?php
 foreach ($result as $value)
 {
  ?>
<tbody>
    <tr>
      <td><a href="? public=postDatails&id=<?php echo $value['id']   ?>"><?php echo $value["title"] ?></a></td>
   
    </tr>
   
  </tbody>

  <?php
 }
 ?>
</table>

 <?php

?>