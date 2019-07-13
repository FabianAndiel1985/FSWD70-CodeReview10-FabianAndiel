<?php
  require_once 'dbconnect.php';
  ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style type="text/css">

      table,td,th {
        border:1px solid black;
      }

    </style>

    <title> </title>
  </head>
  <body>

    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li>
          </ul>
        </div>
      </nav> 
    </div>  

    <div class="container-fluid">
     

    <?php

        // Start getting the data back and fill in the input fields

      if($_GET['ISBN']) {
        $ISBN = $_GET['ISBN'];
        $query = "SELECT * FROM media WHERE ISBN = $ISBN";
        $result = mysqli_query($conn,$query);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        
        $ISBN =   $row['ISBN'];
        $title =  $row['title'];
        $description =  $row['description'];
        $type =  $row['type'];
        $publish_date =  $row['publish_date'];
        $availability =  $row['availability'];
        $FK_publisher_ID =  $row['FK_publisher_ID'];

      }

      // END getting the data back and fill in the input fields

     
      // Start getting the data back and fill in the input fields

     if(isset($_POST['saveChange'])) {

        $ISBN =   $_POST['ISBN'];
        $title =  $_POST['title'];
        $description =  $_POST['description'];
        $type =  $_POST['type'];
        $publish_date =  $_POST['publish_date'];
        $availability =  $_POST['availability'];
        $FK_publisher_ID =  $_POST['FK_publisher_ID'];
       
        
        $query = "UPDATE media SET 
                  title= '$title',
                  description = '$description',
                  type = '$type',
                  publish_date = '$publish_date',
                  availability = '$availability',
                  FK_publisher_ID = '$FK_publisher_ID'
                  WHERE ISBN = '$ISBN';" ; 

        $updatedData = mysqli_query($conn,$query);
      
        if ($updatedData) {
            echo "Updated successfully";
        }

        else if (!$updatedData) {
          echo "ERROR! Try again";
        }
     }
        


    ?>


    <form action="update.php" method="post">
        
        <div class="form-group">
          <label for="ISBN">ISBN</label>
          <input type="hidden" class="form-control" name="ISBN" id="ISBN" value="<?php echo $ISBN;?>">
        </div>

        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" id="title" value="<?php echo $title;?>">
        </div>

        <div class="form-group">
          <label for="description">Description</label>
          <input type="text" class="form-control" id="description" name="description" value="<?php echo $description;?>">
        </div>

        <div class="form-group">
          <label for="type">Typ </label>
          <input type="text" class="form-control" id="type" name="type" value="<?php echo $type;?>">
        </div>

        <div class="form-group">
          <label for="publish_date">Publish Date</label>
          <input type="text" class="form-control" id="publish_date" name="publish_date" value="<?php echo $publish_date;?>">
        </div>

        <div class="form-group">
          <label for="availability">Availability</label>
          <input type="text" class="form-control" id="availability" name="availability" value="<?php echo $availability;?>">
        </div>

        <div class="form-group">
          <label for="FK_publisher_ID">Publisher</label>
          <input type="text" class="form-control" id="FK_publisher_ID" name="FK_publisher_ID" value="<?php echo $FK_publisher_ID;?>">
        </div>

        <button  class="btn btn-primary" name="saveChange">Save Changes</button>

      </form>
     </div>

   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>