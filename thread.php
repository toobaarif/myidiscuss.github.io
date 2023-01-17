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
  </head>
<style>
  body{
    background-color: rgb(236, 253, 236);
  }
</style>
  
<body>
<!-- slider from crou bootstrap -->
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/slide3.png" class="d-block w-100" alt="...">
    
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


<?php

// dynamically add title and description by id

$id = $_GET["threadid"];
$sql = "SELECT * FROM `threads` WHERE `thread_id` = $id";
$result = mysqli_query($connect, $sql);

$noResult = true;
while($row = mysqli_fetch_assoc($result)){
  $noResult = false;
  $threadtitle = $row["thread_title"];
  $threaddes = $row["thread_des"];

    // // show user name when he or she post an answer
    // $ans_by = $row["ans_by"];
    // $sql2 = "select `user_email` from `users` where `user_id` = '$ans_by'";
    // $result2 = mysqli_query($connect, $sql2);
    // $user_emailid_fetch = mysqli_fetch_assoc($result2);

    // $post_by = $user_emailid_fetch['user_email'];

}

?>

<div class="container my-4">

<!-- jombotron bootstarp -->
<div class="jumbotron">
  <h1 class="display-4"><?php echo $threadtitle; ?> </h1>
  <p class="lead">
    <?php echo $threaddes; ?>
  </p>
  <!-- <p><b>Poste by:  </b></p> -->
  <hr class="my-4">


</div>

</div>

<?php
$showAlert = false;
if($showAlert){
  echo "<div class='alert alert-success alert-dismissible fade show my-0' role='alert'>
  <strong>Success!</strong> Your account is now created and you can login
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>×</span>
  </button>
</div>";
}
// <!-- form to answering the question -->
// if you are login than you can start a discussion and add answers and aask questions
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
echo '
<div class="container">

<h1>Post Comment</h1>
<form action="'. $_SERVER["REQUEST_URI"] .'"  method="post">


<div class="form-floating">
  <textarea class="form-control" placeholder="Leave a comment here" id="answer" name="answer" style="height: 100px" required></textarea>

  <input type="hidden" name="user_id" value=" ' .  $_SESSION["user_id"] .'">

  <label for="floatingTextarea2">Add Comment</label>
</div>

  <button type="submit" class="btn btn-success my-4">Post Comment</button>
</form>
</div>';
}
else{
  echo '<div class="container">
  <h2>Post comment</h2>
  <p lass="lead">You are not logged in. Please login to be able to add answers of questions.</p>
</div>
';
}
?>

<!-- if someone fill this form and sbmit it so question addded into questionthred side , database -->
<?php


$method = $_SERVER["REQUEST_METHOD"];
if($method == 'POST'){
  // insert into db
  $answer = $_POST["answer"];

// for security purpose no run found we replace these < > tags
  $answer = str_replace("<", "&lt;", $answer);
  $answer = str_replace(">", "&gt;",  $answer);
  $user_id = $_POST["user_id"];

$sql = "INSERT INTO `answers` (`ans_content`, `thread_id`, `ans_by`, `time`) VALUES ('$answer', '$id', '$user_id',current_timestamp())";
  $result = mysqli_query($connect, $sql);
  $showAlert = true;

}

?>
<div class="container my-4">
    <h1 class="py-4">Discussion</h1>
<!-- if someone fill this form and sbmit it so question addded into questionthred side , database -->
<?php
$id = $_GET["threadid"];
$sql = "SELECT * FROM `answers` where `thread_id` = $id";
$result = mysqli_query($connect, $sql);

$noResult = true;
while($row = mysqli_fetch_assoc($result)){
  $noResult= false;
  $ans_id = $row["ans_id"];
  $ans_content = $row["ans_content"];
  // show user name when he or she post an answer
  $ans_by = $row["ans_by"];
  $sql2 = "select `user_email` from `users` where `user_id` = '$ans_by'";
  $result2 = mysqli_query($connect, $sql2);
  $user_emailid_fetch = mysqli_fetch_assoc($result2);


    // <!-- question bootstrap -->
    echo ' 
  <div class="media my-3">
  <div class="media-body">
    
  <img src="img/user.png" width="40px" alt="...">
  <p class="font-weight-bold my-0"><b>'. $user_emailid_fetch["user_email"] .'</b></p>
    '. $ans_content .'
  </div>
  </div>
';
}

if($noResult){

  echo "<h2>No Comments found</h2> <br> <b> Be the first person to ask questions </b>
  <br> <br>";
}
?>
    
</div>
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

