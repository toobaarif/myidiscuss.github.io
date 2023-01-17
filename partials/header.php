<?php

session_start();

echo '
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="/forumproject3">iDiscuss</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/forumproject3/index.php">Home</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/forumproject3/about.php">About</a>
      </li>

  
      <li class="nav-item">
      <a class="nav-link" href="contact.php">Contact</a>
    </li>
    </ul>
';


if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

  echo '
  <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    <p class="text-light"> '. $_SESSION["user_email"] .'</p>

  <a href="partials/logout.php" class="btn btn-success">Logout</a>

    </form>';
}
else{
  echo '
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>

    <!-- login and signup buttons -->
    <div class="mx-2">
    <button class="btn btn-success" data-toggle="modal" data-target="#loginModal">Login</button>
    <button class="btn btn-success" data-toggle="modal" data-target="#signupModal">Signup</button></div>
';
}

echo '
  
</div>
</nav>

';


include "partials/loginModal.php";
include "partials/signupModal.php";


?>