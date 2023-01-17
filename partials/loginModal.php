

<?php

require_once "connect.php";
$success = false;
if(isset($_REQUEST["button"])){
  $email = $_POST["email"];
  $password = $_POST["password"];

  $sql = "SELECT * FROM `users` WHERE `user_email` = '$email' AND `password` = '$password'";
  $result = mysqli_query($connect, $sql);
  $userExist = mysqli_num_rows($result);

  if($userExist == 1){

    while($row = mysqli_fetch_assoc($result)){

      $success = true;
      session_start();
    
      $_SESSION["loggedin"] = true;
      $_SESSION["user_email"] = $email;
      $_SESSION["user_id"] = $row["user_id"];

     

    header("Location: index.php?success=true");
    }
  }
  else{
    echo "<div class='alert alert-danger alert-dismissible fade show my-0' role='alert'>
    <strong>Error!</strong>Password do not match or username already exist
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
}

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
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login to iDiscuss</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <!-- form for login -->
            <form action="index.php" method="post">
            <div class="modal-body">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
  </div>

  <button type="submit" class="btn btn-success" name="button" required>Login</button>
</div>
</form>

        </div>
    </div>
</div>