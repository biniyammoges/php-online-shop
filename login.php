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
        <h1 style="margin-right: 10px">
          <i class="fas fa-power-off"></i> Login
        </h1>
        <?php
        require('db.php');
        session_start();
        // If form submitted, insert values into the database.
        if (isset($_POST['login'])) {
          $email = $_POST['email'];
          $password = $_POST['password'];

          //Checking is user existing in the database or not
          $query = "select * from user where email='$email' and password='$password'";
          $result = $con->query($query) or die('failed');
          // $rows = mysqli_num_rows($result);
          $data = $result->fetch_assoc();
          if ($data) {
            $_SESSION['name'] = $data['name'];
            $_SESSION['id'] = $data['id'];
            header("Location: authenticated.php"); // Redirect user to index.php
          } else {
            echo "<div class='form'><p>Username or password is incorrect.</p></div>";
          }
        } ?>
        <form action="" method="POST">
          <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" placeholder="Enter email" required />
          </div>
          <div class="form-group">
            <label for="pwd">Password</label>
            <input id="pwd" name="password" type="password" placeholder="Enter password" required />
          </div>
          <button type="submit" name="login" class="btn-b">Login</button>
        </form>
        <p>
          No account?
          <a href="./register.php">Register <i class="fas fa-arrow-right"></i></a>
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