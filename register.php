<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Astu | login</title>
  <link rel="stylesheet" href="./style.css" />
  <link rel="stylesheet" href="./css/all.css" />
</head>


<body>
  <div class="login">
    <div class="container-f">
      <div>
        <h1><i class="fas fa-plus"></i> Register</h1>

        <?php
        require('./db.php');
        session_start();
        if (isset($_POST['register'])) {
          $name = $_POST['name'];
          $email = $_POST['email'];
          $password = $_POST['password'];

          $query = "insert into user (name, email, password) values ('$name', '$email', '$password');";

          $existQ = "select * from user where email = '$email'";

          // $result = $con->query($query);
          $result = $con->query($existQ);

          $data = $result->fetch_assoc();

          if ($data) {
            echo "<p>Email '$email' is already used!</p>";
          } else {
            $res = $con->query($query);

            if ($result) {
              $_SESSION['name'] = $name;
              $_SESSION['id'] = $data['id'];
              header("Location: authenticated.php"); // Redirect user to authenticated.php
            }
          }
        }
        ?>

        <form action="" method="POST">
          <div class="form-group">
            <label for="name">Name</label>
            <input id="name" name="name" type="name" placeholder="Full name" required />
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" placeholder="Enter email" required />
          </div>
          <div class="form-group">
            <label for="pwd">Password</label>
            <input id="pwd" name="password" type="password" placeholder="Enter password" required />
          </div>

          <button type="submit" name="register" class="btn-b">Signup</button>
        </form>
        <p>
          Already registered?
          <a href="./login.php">Login <i class="fas fa-arrow-right"></i></a>
        </p>
        <div class="divider flex">
          <div class="line"></div>
          <span>or</span>
          <div class="line"></div>
        </div>
        <div class="social-login flex">
          <a href="#" class="btn-b google"><i class="fab fa-google"></i> Google</a>
          <a href="#" class="btn-b github"><i class="fab fa-github"></i> Github</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>