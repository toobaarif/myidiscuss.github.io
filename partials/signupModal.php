

<!-- llogin php -->
<?php

require_once "connect.php";

$error = false;
$success = false;
if(isset($_REQUEST["button"])){

  $fname = $_REQUEST["fname"];
  $lname = $_REQUEST["lname"];
  $email = $_REQUEST["email"];
  $password = $_REQUEST["password"];
  $cpassword = $_REQUEST["cpassword"];

  // fetch row for the checking of is it is not alreay signed up
  $sql = "SELECT * FROM `users` WHERE `user_email` = '$email'";
  $result = mysqli_query($connect, $sql);

  $userExist = mysqli_num_rows($result);

  if($userExist != 0){
    $error = true;
  }
  else{
    if($password == $cpassword){
      $sql = "INSERT INTO `users` (`user_fname`, `user_lname`, `user_email`, `password`,`date`) VALUES ('$fname', '$lname', '$email', '$password', current_timestamp())";
      $result = mysqli_query($connect, $sql);
      $success = true;
      header("Location: index.php?success=true");
    }
    else{
      $error = true;
    }
  }
  
}



  //  if data is not inserted
  if($error){
    echo "<div class='alert alert-danger alert-dismissible fade show my-0' role='alert'>
    <strong>Error!</strong>Password do not match or username already exist
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }

         // if data is inserted into database
         if($success){
          echo "<div class='alert alert-success alert-dismissible fade show my-0' role='alert'>
          <strong>Success!</strong> Your account is now created and you can login
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>×</span>
          </button>
        </div>";
        }
?>


<!-- modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Sign up to create your account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- form for login -->
            <form action="index.php" method="post">
            <div class="modal-body">


            <div class="mb-3">
    <label for="fname" class="form-label">Fisrt Name</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="fname" required>
  </div>

  <div class="mb-3">
    <label for="lname" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="lname" required>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="cpassword" required>
  </div>

  <button type="submit" class="btn btn-success" name="button">Signup</button>
</div>
</form>


            </div>
        </div>
    </div>
</div>