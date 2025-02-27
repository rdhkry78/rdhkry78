<?php
require('config/config.php')

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <title>Title</title>
</head>

<body>

  <section>
    <div class="contianer w-25 mx-auto my-5 shadow p-3">
      <h3 class="text-center">Sign Up</h3>
      <?php
      if (isset($_POST['register'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if ($name != ""  && $email != "" && $password != "") {
          $query = "INSERT INTO users(name,email,password) VALUES ('$name','$email','$password') ";
          $result = mysqli_query($con, $query);
          if ($result) {
            echo "Data is submitted successfully";
            header("refresh:2;URL=register.php");
          } else {
            echo "Data is not sumitted, try again";
            header("refresh:2;URL=register.php");
          }
        }
      }
      ?>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Name</label>
          <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" name="register" class="btn btn-primary">Submit</button>
        <p>Don't have an account <a href="index.php">Sign In</a></p>
      </form>
    </div>
  </section>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>