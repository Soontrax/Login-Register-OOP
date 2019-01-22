<?php
  include "inc/header.php";
  include "lib/User.php";
?>

<?php
  $user = new User();
  if (isset($_POST["register"])&& $_POST) {
    $usrRegi = $user->userRegistration($_POST);
  }
?>

<div class="container mt-5">
  <div class="jumbotron">
    <h3>Welcome to the Register Page</h3>
  </div>

  <?php
  //Validamos si ha habido errores si los hay los mostramos
  if (isset($usrRegi)) {
    echo $usrRegi;
  }
  ?>
  <form action="" method="POST">
  <div class="form-group">
      <label for="name">Name</label>
      <input type="name" id="name" name="name" class="form-control" placeholder="Use your name" >
    </div>

    <div class="form-group">
      <label for="Username">Your username</label>
      <input type="text" id="Username" name="username" class="form-control" placeholder="Username" >
    </div>

    <div class="form-group">
      <label for="Email Address">Email Address</label>
      <input type="email" id="Email Address" name="email" class="form-control" placeholder="Email Address" >
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" class="form-control" placeholder="Password" >
    </div>
    <button type="submit" name="register" class="btn btn-primary">Register</button>
  </form>
</div>