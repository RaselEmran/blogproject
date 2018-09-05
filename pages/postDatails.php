
<?php

$id = $_GET["id"];
 $select = "SELECT post.*, user_regi.username AS username,category.name AS cate,category.id AS catid FROM((post INNER JOIN user_regi ON post.user_id=user_regi.id)INNER JOIN category ON post.category_id= category.id) WHERE post.id=".$id;
 $result = mysqli_query($conn, $select);
 foreach ($result as $value) {
    echo '     <article>
                        <h2><a href="">'.$value["title"].'</a></h2>
                        <h4><a href="">'.$value['cate'].'</a></h4>
                         <p>';

                       echo $value["description"];
                      

                        echo '</p>
                       
                        <P>Posted by <a href="? public=userdetails&id='.$value["user_id"].'&user='.$value["username"].'">'.$value["username"].'</a></p>
                    </article>';
    
 }
 ?>
 <div class="mt-5" style="text-align: center;padding: 15px 0;background-color: blue;color: #fff; margin: 15px 0">
 	<h3>Related Post..</h3>
 </div>

 <?php
 //related post query......
 $relatedid  = $value["catid"];
 $relatedpost ="SELECT * FROM post WHERE category_id ='$relatedid' ORDER BY id DESC LIMIT 0,7 ";
 $relatedshow =mysqli_query($conn,$relatedpost);
 foreach ($relatedshow as $key => $relete) {
 	//bracet start....
 ?>
<div class="h4" style="padding: 10px 0px;border: 1px solid blue">
	<a href="? public=postDatails&id=<?php echo $relete['id']   ?>"><?php echo $relete["title"] ?></a>
</div>


 <?php
 //bracet and php end...in related post section...
 }
 //insert comment data......
if (isset($_POST["commit"])) {
	$text =$_POST["comment"];
	$public =$_POST["user"];
	$posttitle =$_POST["postid"];
	$commentisert ="INSERT INTO comment(comment,userid,postid)VALUES('$text','$public','$posttitle')";
	mysqli_query($conn,$commentisert);

}

?>
<?php
//select comment username postid and profile image comment,user-regi and post table..
$comment_select ="SELECT comment.*, user_regi.username AS username,user_regi.path AS profile,post.title AS posttile FROM((comment INNER JOIN user_regi ON comment.userid=user_regi.id)INNER JOIN post ON comment.postid= post.id) WHERE post.id=".$id;

$comment_array =mysqli_query($conn,$comment_select);
?>
<div class="alert alert-dark mt-5" role="alert">
 <h5>Total Comment <b>(<?php echo mysqli_num_rows($comment_array); ?>)</b></h5>
</div>


<?php

foreach ($comment_array as $key => $comment_show) 
//comment data show.....
{
	?>

   <div class="row no-gutters">
   	<div class="col-md-2">
   		<div class="alert alert-primary" role="alert">
<img class="rounded-circle" width="50px"src="pages/<?php echo $comment_show["profile"]  ?>" alt="" >
<p><?php  echo $comment_show["username"]   ?></p>
</div>
	
   	</div>
   	<div class="col-md-10">
   		<div class="alert alert-warning" role="alert">
 <?php  echo $comment_show['comment'] ?>
</div>
   		
   	</div>
   </div>


	<?php
	
	
}
//show comment data brackets.....

if( isset($_SESSION['username']) && !empty($_SESSION['username']) )
{
	//if userlogin then he or she comment...
	$name = $_SESSION['username'];
	//select data in user-regi table.....
	$regi ="SELECT * FROM user_regi WHERE username ='$name'";
	$regi_result =mysqli_query($conn,$regi);
	$fetch = mysqli_fetch_assoc($regi_result);
	//select data in post table...
	$post ="SELECT * FROM post WHERE id='$id'";
	$post_result =mysqli_query($conn,$post);
	$post_fetch =mysqli_fetch_assoc($post_result);
	$postal_id =$post_fetch['id'];
	//user login show this from
	?>
	<div style="color: blue;padding: 4px"><h5>Add Your Comment</h5></div>
	<form action="" method="post">
		 <div class="form-group">
	<textarea  class="form-control" name="comment" id=""></textarea>
</div>
	<input type="hidden" name="user" value="<?php echo $fetch['id'] ?>">
 <input type="hidden" name="postid" value="<?php echo $post_fetch['id'] ?>">
	<input class="btn btn-primary btn-lg" type="submit" name="commit" value="Set">
</form>
	<?php
}
else{
	//if user not login show this from....
	?>
	<div style="color: blue;padding: 4px"><h5>First Login Then Set your comment</h5></div>
<form action="" method="post">
		 <div class="form-group">
	<textarea  class="form-control" name="comment" id="" readonly="readonly"></textarea>
</div>	<input class="btn btn-primary btn-lg" type="submit" name="commit" value="Set">
</form>
	<?php
	
}
//end php....

?>

