<?php
//must login...
if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: index.php');
    }
//select data in user-contact table...
 $seen ="SELECT * FROM contact WHERE status ='no' ";  
 $seen_result = mysqli_query($conn, $seen);  


//end php...
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
                <h3 align="center" style="color: red">Unseen Messege</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr class="bg-info">  
                                    <td>Name</td>  
                                    <td>Email</td>  
                                    <td>messese</td>  
                                    <td>Status</td>  
                                    <td>Action</td>
                                    <td>Delete</td>  
                               </tr>  
                          </thead>  
                          <?php 
                          //strat php 
                          //loop for select statement...
                          while($row = mysqli_fetch_array($seen_result))  
                          {  //end php and html section strat...
                             ?>
                             <tr>
                      
                              <td><?php echo $row["name"] ?></td>
                             	<td><?php echo $row["email"] ?></td>
                             	<td><?php echo $row["messege"] ?></td>
                                <td><?php echo $row["status"] ?></td>
                             	<td><a href="approve.php?seen=<?php echo $row["id"]?>">Seen</a>|| <a href="">Repley</a></td>


                            	<td>
                                <!- Delete button by modal!>

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
					          <a href="delete.php?comment=<?php echo $row['id']; ?>"><button type="button" class="btn btn-danger"> Yes..! Delete</button></a>
					        </div>
					      </div>
					      
					    </div>
					  </div>
          </td>
        </tr>
 <?php } ?>  
 </table>  
</div> 
<!- Secon table stared-!> 
            
 <div style="margin: 40px 0px">
  <?php
  //select data by contact table.....
$seenby ="SELECT * FROM contact WHERE status='yes'";
$Total_result =mysqli_query($conn,$seenby);


  ?>
   <h3 align="center" style="color: green">Seen Messege</h3>  
                <br /> 
   <div class="table-responsive">  
                     <table id="employee" class="table table-striped table-bordered">  
                          <thead>  
                               <tr class="bg-primary">  
                                    <td>Name</td>  
                                    <td>Email</td>  
                                    <td>Messsege</td>  
                                    <td>Status</td>  
                                    <td>Email</td>
                                    <td>Delete</td>  
                               </tr>  
                          </thead>  
                          <?php  
                          while($rr = mysqli_fetch_array($Total_result))  
                          {  
                             ?>
                             <tr>
                              <td><?php echo $rr["name"] ?></td>
                              <td><?php echo $rr["email"] ?></td>
                              <td><?php echo $rr["messege"] ?></td>
                            
                              <td><?php echo $rr["status"] ?></td>
                                  <td><a href="notApprove.php?unseen=<?php echo $rr["id"]?>">UnSeen</a></td>
                              <td>

          <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $rr['id']; ?>">Delete</button>

          <!-- Modal -->
            <div class="modal fade" id="myModal<?php echo $rr['id']; ?>" role="dialog">
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
                    <a href="delete.php?comment=<?php echo $rr['id']; ?>"><button type="button" class="btn btn-danger"> Yes..! Delete</button></a>
                  </div>
                </div>
                
              </div>
            </div>
          </td>
        </tr>
       <?php }?>  
   </table>  
 </div>  
 </div>
 </div>

<script src="js/jquery.min.js"></script>
	
	<script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
  $(document).ready(function(){  
      $('#employee').DataTable();  
 }); 
 </script> 
</body>
</html>