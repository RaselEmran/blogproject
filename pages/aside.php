                     <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <form class="input-group" action="" method="post">
                <input type="text" name="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                 <input class="btn btn-secondary" type="submit" name="search" value="!GO">
                </span>
              </form>
            </div>
          </div>
                    <h2>Last Uploaded post</h2>
                    <ul class="list-group mb-3">
                         <?php
                  $noticepost = "SELECT * FROM post WHERE status ='yes' ORDER BY id DESC LIMIT 0,5 ";
                  $result = mysqli_query($conn,$noticepost);
                  foreach ($result as $value) {
                    ?>
                    <li class="list-group-item"><a href="? public=postDatails&id=<?php echo $value['id']   ?>"><?php echo $value["title"] ?></a></li>
                    <?php
   
                     }

                     ?>
                       
                    </ul>
                    <h2>Category</h2>
                      <ul class="list-group ">
                        <?php
                       $Category = "SELECT * FROM Category";
                       $Cat_result = mysqli_query($conn,$Category);
                       foreach ($Cat_result as  $value) {
                           ?>
                            <li class="list-group-item"><a href="?public=getCategory&id=<?php echo $value["id"] ?>"><?php echo $value["name"] ?></a></li>


                           <?php
                       }

                        ?>
                     
                    </ul>
            
