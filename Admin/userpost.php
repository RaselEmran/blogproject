<?php
if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: index.php');
    }

 $query ="SELECT post.*,user_regi.username As user,category.name As cate FROM post INNER JOIN user_regi ON post.user_id = user_regi.id INNER JOIN category ON post.category_id = category.id ";  
 $result = mysqli_query($conn, $query);  



?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  
</head>
<body>
<br /><br />  
           <div class="container">  
                <h3 align="center">UPloaded User Post</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr >  
                                    <td>Title</td>  
                                    <td>Post_by</td>  
                                    <td>Category</td>  
                                    <td>Status</td>  
                                    <td>Approve</td>
                                    <td>Not Approve</td>  
                                      <td>Delete</td> 
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                             ?>
                             <tr class="bg-warning">
                              <td><a href="?public=postdetails.php&postid=<?php echo $row["id"]?>"><?php echo $row["title"] ?></a></td>
                              <td><?php echo $row["user"] ?></td>
                              <td><?php echo $row["cate"] ?></td>
                              <td><?php echo $row["status"] ?></td>
                              <td><a href="approve.php?id=<?php echo $row["id"]?>">Approve</a></td>
                             <td><a href="notApprove.php?id=<?php echo $row["id"]?>">Not-Approve</a></td>
                                            <td>

          <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $row['id']; ?>">Delete</button>

          <!-- Modal -->
            <div class="modal fade" id="myModal<?php echo $row['id']; ?>" role="dialog">
              <div class="modal-dialog">
              
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delete File</h4>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a href="delete.php?delete=<?php echo $row['id']; ?>"><button type="button" class="btn btn-danger"> Yes..! Delete</button></a>
                  </div>
                </div>
                
              </div>
            </div>

        </td>
  </tr>
  <?php } ?>  
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