<?php

session_start();
session_unset();
$destroy = session_destroy();

// echo "Loging you out please wait...";
header("Location: /forumproject3?success=logout");


if($destroy){
    echo "<div class='alert alert-danger alert-dismissible fade show my-0' role='alert'>
    <strong>Error!</strong>Password do not match or username already exist
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
}

?>