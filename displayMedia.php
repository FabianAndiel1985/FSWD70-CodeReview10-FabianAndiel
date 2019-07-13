
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

      #main {
        margin-top: 40px;
      }

    

    </style>

    <title> </title>
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

    <div class="container" id="main">

      <table class="table">
        <thead>
          <tr>
            <th scope="col">ISBN</th>
            <th scope="col">title</th>
            <th scope="col">description</th>
            <th scope="col">type</th>
            <th scope="col">publish date</th>
            <th scope="col">availability</th>
            <th scope="col">publisher</th>
          </tr>
        </thead>



   

    <?php

       $query = "SELECT * FROM media";

       $retrievedData= mysqli_query($conn, $query);


      // $retrievedDataArray=mysqli_fetch_array($retrievedData,MYSQLI_ASSOC);

      // echo $retrievedDataArray['title'];

       if (mysqli_num_rows($retrievedData)>0) {
        // echo "Fabian ist toll";

          while($row = mysqli_fetch_assoc($retrievedData) ) {

            echo "<tbody> 
                    <th scope='row'>".$row['ISBN']."</th>
                    <td>".$row['title']."</td>
                    <td>".$row['description']."</td>
                    <td>".$row['type']."</td>
                    <td>".$row['publish_date']."</td>
                    <td>".$row['availability']."</td>
                    <td>".$row['FK_publisher_ID']."</td>
                    <td>
                      <a href='update.php?ISBN=".$row['ISBN']."'> 
                        <button> edit 
                        </button>
                      </a>
                    </td>
                    <td> 
                      <a href='delete.php?ISBN=".$row['ISBN']."'>
                      <button> delete 
                      </button>
                      </a>
                    </td>
                  </tr>
                  </tbody>";
          }

       }

    ?>

     </table> 
     </div>

   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>