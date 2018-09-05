
<?php

$id =$_GET['id'];


 $select =  "SELECT post.*, user_regi.username AS username,category.name AS cate FROM((post INNER JOIN user_regi ON post.user_id=user_regi.id)INNER JOIN category ON post.category_id= category.id)WHERE category.id =$id";//pagination value..
 $result = mysqli_query($conn, $select);
 foreach ($result as $value) {
    echo '     <article>
                        <h2><a href="? public=postDatails&id='.$value["id"].'">'.$value["title"].'</a></h2>
                        <h4><a href="">'.$value['cate'].'</a></h4>
                         <p>';

                       $text =  $value["description"];
                       if(strlen($text)>380)
                       {
                       	$text = substr($text, 0,380);
                       	echo $text.'.......';
                       }

                        echo '</p>
                        
                        <P>Posted by <a href="? public=userdetails&id='.$value["user_id"].'&user='.$value["username"].'">'.$value["username"].'</a></p>
                    </article>';
                    ?>
                    <a class="btn btn-primary btn-lg" href="? public=postDatails&id=<?php echo $value["id"] ?>">Read more..</a>

                    <?php
                  
    
 }
 //end post.....
 //pagination select.....


?>




       

              
