<?php
  include "inc/header.php";
  include "lib/User.php";
?>

<?php
  $user = new User();
  if (isset($_POST["login"])&& $_POST) {
    $usrLogin = $user->userLogin($_POST);
  }
?>

<div class="container mt-5">
  <div class="jumbotron">
    <h3>Welcome to the Login Page</h3>
  </div>
  <?php
  //Validamos si ha habido errores si los hay los mostramos
  if (isset($usrLogin)) {
    echo $usrLogin;
  }
  ?>
  <form action="" method="POST">
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" name="email" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name="password" class="form-control" placeholder="Password">
    </div>
    <button type="submit" name="login" class="btn btn-primary">Submit</button>
  </form>
</div>