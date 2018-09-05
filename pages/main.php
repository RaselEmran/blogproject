
<?php
error_reporting(0);
if (isset($_POST["search"])) {
  //receive search value....
  //this search from is aside section...
  $text =$_POST["text"];


}
//pagination .......
$page =$_GET["page"];
if ($page=="" || $page=="1") {
	$page1 =0;
}
else {
	$page1 = ($page*3)-3;
}
//end logig pagination....
//select post joining table...


 $select = "SELECT post.*, user_regi.username AS username,category.name AS cate,category.id AS catid FROM((post INNER JOIN user_regi ON post.user_id=user_regi.id)INNER JOIN category ON post.category_id= category.id) WHERE status = 'yes'";
 //search text......
if ($text !="") {
 $select.="&& post.title LIKE'%".$text."%'";
}
//concatenet....query..
 $select.=" ORDER BY id DESC LIMIT $page1,3 ";//pagination value..
 $result = mysqli_query($conn, $select);
 foreach ($result as $value) {
    echo '     <article>
             <div class="card mb-4">
             <div class="card-body">
                        <h2 class="card-title"><a href="? public=postDatails&id='.$value["id"].'">'.$value["title"].'</a></h2>
                        <h4><a href="? public=getCategory&id='.$value["catid"].'">'.$value['cate'].'</a></h4>
                         <p class="card-text">';

                       $text =  $value["description"];
                       if(strlen($text)>380)
                       {
                       	$text = substr($text, 0,380);
                       	echo $text.'.......';
                       }

                        echo '</p>
                        </div>
                         <div class="card-footer text-muted">
                        <P>Posted by <a href="? public=userdetails&id='.$value["user_id"].'&user='.$value["username"].'">'.$value["username"].'</a> ||<span>'.$value["time"].'</span></p>
                        </div>
                        </div>
                    </article>';
                    ?>
                    <a class="btn btn-primary btn-lg" href="? public=postDatails&id=<?php echo $value["id"] ?>">Read more..</a>
                    
                    <?php
                  
    
 }
 //end post.....
 //pagination select.....

$pageSelect = "SELECT * FROM post";
$rr = mysqli_query($conn,$pageSelect);
$coo = mysqli_num_rows($rr);
$a =$coo/3;
$a = ceil($a);
?>
<nav aria-label="...">
	<ul class="pagination justify-content-center pt-5 mt-4">

<?php
for($b=1; $b<=$a; $b++)
{
	?>
	 <li class="page-item "><a  class="page-link"  href="?page=<?php echo $b; ?>"><?php echo $b." ";?></a></li>

	<?php
}
?>
  </ul>
</nav>
<?php
?>

       

              
