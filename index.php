<!-- header -->
<?php


 require "partials/header.php";

include_once "partials/connect.php";

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iDiscuss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <style>
body{
  background-color: rgb(236, 253, 236);
}

</style>
  </head>

  
<body>

<!-- slider from crou bootstrap -->
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
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
</div>



<!-- category container -->
<!-- col of card -->
<div class="container my-3">
  <h1 class="text-center my-4">iDiscuss Categories </h1>

  <!-- row -->
  <div class="row">


  <!-- fetch all the categories by and using loop to iterate the categories -->
<?php

$sql = "SELECT * FROM `categories`";
$result = mysqli_query($connect, $sql);

while($row = mysqli_fetch_assoc($result)){
  // echo $row["category_id"];
$catname = $row["category_name"];
$catdes = $row["category_des"];
$id = $row["category_id"];

  echo '
  <!-- 4 coluns of card category  -->
  <div class="col-md-4 my-4">

  <!-- cards -->
    <div class="card center" style="width: 18rem;">
  <img src="https://source.unsplash.com/500x400/?, ' . $catname. ' coding computer" class="card-img-top" alt="...">
  <div class="card-body">
    <h4 class="card-title"><a class="text-success" href="threadList.php?catid=' . $id. '">' . $catname. '</a></h4>
    <p class="card-text">'. substr($catdes, 0, 80) .'...</p>
    <a  href="threadList.php?catid=' . $id. '" class="btn btn-success">View Threads</a>
            </div>
       </div> 
  </div>
  ';

}

?>
  
  </div>
</div>

<!--  Optional JavaScript -->
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
require "partials/footer.php";
?>