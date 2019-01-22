<?php
  include "inc/header.php";
  include "lib/user.php";
  $user = new User();
?>

<?php
    $loginmsg = SESSION::get("loginmsg");
    if (isset($loginmsg)) {
        echo $loginmsg;
    }
?>

<div class="container">

        <div class="jumbotron d-flex justify-content-around">
            <h1>User LIST</h1>
            <h1 class>Welcome</h1>
            <strong><?php 
            $name = SESSION::get("name");
            if (isset($name)) {
                echo $name;
            }
            ?>  
            </strong>
        </div>

        <table class="table container">
            <thead>
                <tr>
                    <th scope="col">Serial</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email Addres</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">01</th>
                    <td>Mark</td>
                    <td>bla</td>
                    <td>mark@gmail.com</td>
                    <td><button type="button" class="btn btn-primary">View</button></td>
                </tr>
                <tr>
                    <th scope="row">02</th>
                    <td>Jacob</td>
                    <td>ble</td>
                    <td>fat@gmail.com</td>
                    <td><button type="button" class="btn btn-primary">View</button></td>
                </tr>
                <tr>
                    <th scope="row">03</th>
                    <td>Larry</td>
                    <td>bli</td>
                    <td>Larry@gmail.com</td>
                    <td><button type="button" class="btn btn-primary">View</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>