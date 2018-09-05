<?php require_once('conn/config.php'); 

session_start();  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>index</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/usestyle.css">
</head>

<body>

    <header>
    <?php include_once 'pages/navigation.php'  ?>
    </header>
    <section>
          <?php include_once 'pages/slider.php'  ?>
    </section>


    <div class="container">
        <div class="row">
            <div class="col-md-8">
             
                  <?php 
                  if(isset($_GET["public"]))
                  {
                    if(file_exists('pages/'.$_GET["public"].'.php'))
                    {
                          include_once 'pages/'.$_GET["public"].'.php';
                    }
                    else
                    {
                       include_once 'pages/404.php';  
                    }
                  
                  }
                  else
                  {
                     include_once 'pages/main.php'; 
                  }


                

                    ?> 
                  
            </div>
            <div class="col-md-4">
             <aside>
                  <?php include_once 'pages/aside.php'  ?> 
                </aside>
            </div>
        </div>
    </div>
      <?php include_once 'pages/footer.php'  ?> 



    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf-8">
 jQuery(function($) {
    // because the 'href' property of the DOM element is the absolute path
     $(function () {
            $('#nav li').click(function (e) {
                
                $('a').removeClass('active');
                $(this).addClass('active');
            });
        });
    });
</script>

</body>

</html>
