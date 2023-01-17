<!-- header -->
<?php require "partials/header.php";?>

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
.container{
    height: 90vh;



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


<div class="container">
    
    <h1 class="text-center">About</h1>

    <!-- jombotron bootstarp -->
<div class="jumbotron">
  <hr class="my-4">
  
  <!-- forum rules -->
  <h3>Here are the some Rules of website:</h3>
  <br>
  Keep it friendly.
  <br>
Be courteous and respectful. Appreciate that others may have an opinion different from yours.
<br>
Stay on topic. ...
<br>
Share your knowledge. ...
<br>
Refrain from demeaning, discriminatory, or harassing behaviour and speech.

  <p>This forum is for sharing of knowledge with each others.</p>
</div>

<br>


<p>Our iDiscuss platform is much helpfull and user friendly website. You can easily signed up and after login you can ask your problem with many of the professional peoples. you can ask any of the problem from this plaatform and professionals answerss and solve your problem. You can also answer the solution of any problem. It is all about freely ask and answer the different problems.   </p>

<br>


<p>If you have any query about us and any of the problem so you can easily contact with us. </p>

<a class="btn btn-success btn-lg" href="contact.php" role="button">Contact Us</a>

</div>

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