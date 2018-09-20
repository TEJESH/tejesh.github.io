
<?php include 'final.php';?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title> Coding task for LAMP Stack position at Czar Securities.</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-4/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="grid.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">

      <?php
      ?>
      <h1> Coding task for LAMP Stack position at Czar Securities.</h1>
      <p class="lead">A dashboard which compares the files in both the versions/folders and display the differences:</p>

      <h3>Dashboard</h3>
      <p>A dashboard which compares the files in both the versions/folders and display the differences:</p>
      <p>File is in v1 but not in v2 </p>
      <p>File is in v2 but not in v1 </p>
      <p>File is in v1 and v2, but content is not the same</p>


<h4>File is in v1 but not in v2 </h4>

      <div class="row">
        <?php
        
        foreach($diffr1 as $match) {e
        ?>
        <div class="col-4"><?php echo $match; ?></div>
        
        <?php
        }
        
        ?>
      </div>

<h4>File is in v2 but not in v1 </h4>

      <div class="row">
        <?php
        
        foreach($diffr3 as $match) {e
        ?>
        <div class="col-sm-4"><?php echo $match; ?></div>
        
        <?php
        }
        
        ?>
      </div>

<h4>File is in v1 and v2, but content is not the same</h4>

      <div class="row">
        <?php
        
        foreach($c as $match) {
        ?>
        <div class="col-4"><?php echo $match; ?></div>
        
        <?php
        }
        
        ?>
      </div>

      
  </body>
</html>

