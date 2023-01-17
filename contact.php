<!-- header -->
<?php 
require "partials/header.php";

include_once "partials/connect.php";
?>




<!-- from bootstrap start -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iDiscuss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">


    <style>
  *{
   margin: 0;
   padding: 0;
  }
  body{
    background-color: rgb(236, 253, 236);
}

.container{
    height: 90vh;
}

</style>
  </head>

  
<body>

<div class="container">

<!-- slider from crou bootstrap -->
<!-- <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/slide1.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/slide2.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/slide3.png" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div> -->

    <h1 class="text-center">Contact Us</h1>

<?php
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){

      echo '
      
    <form action="contact.php" method="get">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Enter your email</label>
      <input type="email" class="form-control input-dark" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" required>
    </div>
  
    <div class="form-floating my-6">
    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="comment" required></textarea>
    <label for="floatingTextarea2">Comments</label>
  </div>
  
    <button type="submit" class="btn btn-primary my-6" name="buttons">Submit</button>
  </form>
      ';
    }

else{
  echo '<div class="container">
  <p lass="lead">You are not logged in. Please login first to be able to contact with us.</p>
</div>
';
}

?>

</div>


<?php

if(isset($_GET["buttons"])){

  $name= $_GET["name"];
  $comment = $_GET["comment"];

  if($name != "" && $comment != ""){
    $sql = "INSERT INTO `contacts` (`name`, `comment`) VALUES ('$name', '$comment')";
    $result = mysqli_query($connect, $sql);
    // header("Location: yes.php?yes");

    // if($result){
    //   header("Location: contact.php.php?success=truessss");
    // }
    // else{
    //   header("Location: contact.php?success=fals");
    // }

 }

 else{
  echo "Pllease  fill all required feild";
}

  }





?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>



<!-- footer -->
<?php
require "partials/footer.php";?>