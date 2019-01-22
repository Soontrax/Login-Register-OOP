<?php
include "inc/header.php";
?>

<div class="container mt-5">
  <div class="jumbotron">
    <h3>User Profile</h3>
    <a class="btn btn-primary" href="index.php">Back</a>
  </div>
  <form action="" method="POST">
  <div class="form-group">
      <label for="name">Name</label>
      <input type="name" id="name" name="name" class="form-control" placeholder="Use your name" required>
    </div>

    <div class="form-group">
      <label for="Username">Your username</label>
      <input type="text" id="Username" name="username" class="form-control" placeholder="Username" required>
    </div>

    <div class="form-group">
      <label for="Email Address">Email Address</label>
      <input type="email" id="Email Address" name="email" class="form-control" placeholder="Email Address" required>
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
    </div>
    <button type="submit" name="register" class="btn btn-primary">Register</button>
  </form>
</div>