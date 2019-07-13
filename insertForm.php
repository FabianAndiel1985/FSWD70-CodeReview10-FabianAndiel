<?php
  require_once 'dbconnect.php'; 

  if(isset($_POST['submitBtn'])) {
    // echo "lalala";
  
    $ISBN = $_POST['ISBN'];  
    $title = $_POST['title'];  
    $description = $_POST['description'];  
    $type = $_POST['type'];  
    $publish_date = $_POST['publish_date'];  
    $availability = $_POST['availability'];  
    $FK_publisher_ID = $_POST['FK_publisher_ID'];  

    echo $publish_date;

    

    $query = "INSERT INTO media (ISBN, title, description,type,publish_date,availability,FK_publisher_ID) VALUES ($ISBN, '$title', '$description', '$type', '$publish_date', '$availability', $FK_publisher_ID)";

    $enteredData = mysqli_query($conn,$query);

    if ($enteredData) {
      echo "new record created";
    }

    else {
      echo " didnt work, try again";
    }

    mysqli_close($conn);

  }



?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">The big library</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link"href="displayMedia.php">Display data</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="insertForm.php">enter new media</a>
            </li>
          </ul>
        </div>
      </nav> 


    </div>  

    <div class="container">

      <form action="insertForm.php" method="post">
        
        <div class="form-group">
          <label for="ISBN">ISBN</label>
          <input type="text" class="form-control" name="ISBN" id="ISBN" placeholder="ISBN input">
        </div>

        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" id="title" placeholder="title input">
        </div>

        <div class="form-group">
          <label for="description">Description</label>
          <input type="text" class="form-control" id="description" name="description" placeholder="description input">
        </div>

        <div class="form-group">
          <label for="type">Typ </label>
          <input type="text" class="form-control" id="type" name="type" placeholder="type input">
        </div>

        <div class="form-group">
          <label for="publish_date">Publish Date</label>
          <input type="text" class="form-control" id="publish_date" name="publish_date" placeholder="publish_date input">
        </div>

        <div class="form-group">
          <label for="availability">Availability</label>
          <input type="text" class="form-control" id="availability" name="availability" placeholder="availability input">
        </div>

        <div class="form-group">
          <label for="FK_publisher_ID">Another label</label>
          <input type="text" class="form-control" id="FK_publisher_ID" name="FK_publisher_ID" placeholder="FK_publisher_ID input">
        </div>

        <button type="submit" class="btn btn-primary" name="submitBtn">Submit</button>

      </form>

    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>