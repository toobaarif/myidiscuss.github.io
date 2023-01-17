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
      <img src="img/slide2.png" class="d-block w-100" alt="...">
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
$id = $_GET["catid"];
$sql = "SELECT * FROM `categories` WHERE `category_id` = $id";
$result = mysqli_query($connect, $sql);

while($row = mysqli_fetch_assoc($result)){
  $catname = $row["category_name"];
  $catdes = $row["category_des"];
}

?>
<div class="container my-4">

<!-- jombotron bootstarp -->
<div class="jumbotron">
  <h1 class="display-4">Welcome to <?php echo $catname; ?> description</h1>
  <p class="lead">
    <?php echo $catdes; ?>
  </p>
  <hr class="my-4">


</div>

</div>

<!-- if someone fill this form and sbmit it so question addded into questionthred side , database -->
<?php

$showAlert = false;
$method = $_SERVER["REQUEST_METHOD"];
if($method == 'POST'){
  // insert into db

  $th_title = $_POST["title"];
  // for security purpose no run found we replace these < > tags
  $th_title = str_replace("<", "&lt;", $th_title);
  $th_title = str_replace(">", "&gt;",  $th_title);

  
  $th_des = $_POST["des"];
  // for security purpose no run found we replace these < > tags
  $th_des = str_replace("<", "&lt;", $th_des);
  $th_des = str_replace(">", "&gt;",  $th_des);


  $user_id = $_POST["user_id"];


  $sql = "INSERT INTO `threads` (`thread_title`, `thread_des`, `thread_cat_id`, `thread_user_id`, `date`) VALUES ('$th_title', '$th_des', '$id', '$user_id', current_timestamp())";
  $result = mysqli_query($connect, $sql);

  $showAlert = true;
}

?>

<?php

// if user logged in than he can ask questios and ans the questions
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
echo
'
<div class="container">

<h1>Ask a Question</h1>
<!-- // this is form for thread to ask questions -->
<form action="'. $_SERVER["REQUEST_URI"] . '"  method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Problem Title</label>
    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" required>
    <div id="emailHelp" class="form-text">Keep your title as shoert and crisp as possible.</div>
  </div>
<div class="form-floating">
  <textarea class="form-control" placeholder="Leave a comment here" id="des" name="des" style="height: 100px" required></textarea>

  <input type="hidden" name="user_id" value=" ' .  $_SESSION["user_id"] .'">

  <label for="floatingTextarea2">Elobrate your problem</label>
</div>

  <button type="submit" class="btn btn-success my-4">Add question</button>
</form>

</div> ';
}
else{
  echo '<div class="container">
  <h1>Ask a Question</h1>
  <p lass="lead">You are not logged in. Please login to be able to start a dicussion.</p>
</div>
';
}
?>


<div class="container my-4">
    <h2 class="py-4">Browse Questions</h2>
    <!-- if someone fill this form and sbmit it so question show into sreen addded into questionthred side -->
<!-- questions query of diff categories -->
<?php

// thread == question
$sql = "SELECT * FROM `threads` where `thread_cat_id` = $id";
$result = mysqli_query($connect, $sql);

$noResult = true;

while($row = mysqli_fetch_assoc($result)){
  $noResult= false;
  $threadId = $row["thread_id"];
  $threadTitle = $row["thread_title"];
  $threadDes = $row["thread_des"];

  // show user name also when user ask and answer the questions
  $thread_user_id = $row["thread_user_id"];
  $sql2 = "SELECT `user_email` FROM `users` WHERE `user_id` = '$thread_user_id'";
  $result2 = mysqli_query($connect, $sql2);
  $user_id_email = mysqli_fetch_assoc($result2);

    // <!-- question bootstrap -->
    echo ' 
  <div class="media my-3">
  <div class="media-body">
    
  <img src="img/user.png" width="40px" alt="..." class="mr-3">
  
  <p class="font-weight-bold my-0"><b>'. $user_id_email['user_email'] .'</b></p>
    <h5 class="mt-0"><a class="text-success" href="thread.php?threadid='. $threadId .'">'. $threadTitle .'</a></h5>
    '. $threadDes .'
  </div>
  </div>
';
}

if($noResult){

  echo "<h2>No threads found</h2> <br> <b> Be the first person to ask questions </b>
  <br> <br>";
}
?>
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