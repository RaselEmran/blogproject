  
 <?php

 $sql = "SELECT * FROM slider";
$result = mysqli_query($conn,$sql);
$rowcount = mysqli_num_rows($result);



 ?>


  <div class="slider">
            <div id="carouselExampleControls" class="carousel slide " data-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    for ($i=1; $i <=$rowcount ; $i++) { 
                    $row = mysqli_fetch_assoc($result);
                    //active image....
                    if($i ==1)
                    {
                        ?>
                        <div class="carousel-item active">
                        <img class="d-block w-100" height="400px" src="<?php  echo $row["images"];  ?>" alt="First slide" >
                         <div class="carousel-caption d-none d-md-block">
    <h5>  <?php  echo $row["title"];  ?></h5>
  
  </div>
                      
                    </div>
                        <?php

                    }
                    else
                    {//other image...
                        ?>
                            <div class="carousel-item ">
                        <img class="d-block w-100" height="400px" src="<?php  echo $row["images"];  ?>" alt="First slide">
                                         <div class="carousel-caption d-none d-md-block">
    <h5>  <?php  echo $row["title"];  ?></h5>
  
  </div>
          
                    </div>

                        <?php

                    }
 
                    }

                    ?>

                  
                  
                  
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
            </div>
        </div>