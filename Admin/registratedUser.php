<?php
if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: index.php');
    }
//select data in user-regi table...
 $query ="SELECT * FROM user_regi ";  
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
                <h3 align="center">Registrated user List</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>Id</td>  
                                    <td>FirstName</td>  
                                    <td>LastName</td>  
                                    <td>Username</td>  
                                    <td>Email</td>
                                    <td>Delete</td>  
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                             ?>
                             <tr>
                             	<td><?php echo $row["id"] ?></td>
                             	<td><?php echo $row["firstname"] ?></td>
                             	<td><?php echo $row["lastname"] ?></td>
                             	<td><a href="? public=details.php&id=<?php echo $row['id']?>"><?php echo $row["username"] ?></a></td>
                             	<td><?php echo $row["email"] ?></td>
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
					          <a href="delete.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-danger"> Yes..! Delete</button></a>
					        </div>
					      </div>
					      
					    </div>
					  </div>

				</td>
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