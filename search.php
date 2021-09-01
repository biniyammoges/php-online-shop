<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Astu online delivery system</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="./css/all.css" />
</head>

<body>
  <?php require('./db.php') ?>
  <header>
    <div class="container flex">
      <a href="#" class="menu-bar">
        <svg width="24" height="15" viewBox="0 0 24 15" fill="none">
          <rect width="24" height="3" rx="1.5" fill="#C4C4C4" />
          <rect y="6" width="24" height="3" rx="1.5" fill="#C4C4C4" />
          <rect y="12" width="24" height="3" rx="1.5" fill="#C4C4C4" />
        </svg>
      </a>
      <a href="./index.php" class="nav-brand">
        <img src="./assets/astu-logo.svg" alt="logo" />
      </a>
      <form class="search-form flex" method="POST" action="">
        <input type="text" placeholder="Search here." name="search" />
        <button type="submit" name="sub"><i class="fas fa-search"></i></button>
      </form>
      <ul class="nav flex">
        <li>
          <a href="./index.php">Products</a>
        </li>
        <li>
          <a class="cart" href="./cart.php"><i class="fas fa-shopping-cart"></i>
            <?php
            if (isset($_SESSION['cart'])) {
              $count = count($_SESSION['cart']);
              echo "<span>$count</span>";
            } else {
              echo "<span>0</span>";
            }
            ?>
            Cart</a>
        </li>

        <?php
        if (isset($_SESSION['name'])) {
          echo "
                    <li>
                    <a href='./order.php'>Orders</a>
                </li>
                    <li>
                                <a href='#' class='profile'><i class='fas fa-user-circle'></i> $_SESSION[name]</a>
                            </li><li>
                            <a href='./logout.php' class='logout'><i class='fas fa-sign-out-alt'></i> Logout</a>
                        </li>";
        } else {
          echo           "<li>
                    <a href='./login.php' class='signin'><i class='fas fa-power-off'></i> Login</a>
                  </li>
                  <li>
                    <a href='./register.php' class='signup'>
                      <i class='fas fa-plus'></i>Signup</a>
                  </li>";
        } ?>
      </ul>
    </div>
  </header>
  <?php require('./db.php') ?>

  <?php

  if (isset($_POST['sub'])) {
    $keyword = $_POST['search'];
    $query = "SELECT * FROM products 
    WHERE name like '%$keyword%'";

    $res = $con->query($query);

    $data = $res->fetch_array();
  }
  ?>
  <section class="search">
    <div class="container">
      <?php echo "<h1>Search result for '$keyword' </h1>" ?>
      <div class="results grid">
        <?php
        while ($row = $res->fetch_array()) {
        ?>
          <div class="card flex">
            <div class="card-img">
              <img src="<?php echo $row['image'] ?>" />
            </div>
            <div class="card-body">
              <h1><?php echo $row['name'] ?></h1>
              <div class="rate flex">
                <div class="star"><i class="fas fa-star"></i></div>
                <div class="star"><i class="fas fa-star"></i></div>
                <div class="star"><i class="fas fa-star"></i></div>
                <div class="star"><i class="fas fa-star"></i></div>
                <div class="star"><i class="fas fa-star-half"></i></div>
              </div>
              <p>Price <span> <?php echo $row['price'] ?> ETB</span></p>
              <a href="#" class="order-btn">Order</a>
            </div>
          </div>
        <?php
        }
        ?>

      </div>
    </div>
  </section>
  <script src="./js/mobile.js"></script>

</body>

</html>