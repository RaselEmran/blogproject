<?php
$post_id =$_GET["postid"];
$sql ="SELECT * FROM post WHERE id='$post_id'";
$result =mysqli_query($conn,$sql);
?>
  <div class="card mb-4">
     <div class="card-body">
<?php
foreach ($result as $value) {
	echo ' <h2 class="card-title">'.$value["title"].'</h2>'.'<p class="card-text">'.$value["description"].'</p>';


}
?>
</div>
</div>
<?php

?>