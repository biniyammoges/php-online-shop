<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Astu online delivery system</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="./css/all.css" />
</head>

<body>
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

      <form class="search-form flex" method="POST" action="./search.php">
        <input type="text" placeholder="Search here." name="search" />
        <button type="submit" name="sub"><i class="fas fa-search"></i></button>
      </form>

      <ul class="nav flex">
        <li>
          <a href="#">Products</a>
        </li>
        <li>
          <a href="./cart.php"><i class="fas fa-shopping-cart"></i> Cart</a>
        </li>
        <li>
          <a href="./login.php" class="signin"><i class="fas fa-power-off"></i> Login</a>
        </li>
        <li>
          <a href="./register.php" class="signup">
            <i class="fas fa-plus"></i>Signup</a>
        </li>
      </ul>
    </div>
  </header>
  <section class="products">
    <div class="container">
      <?php require('./db.php') ?>
      <h2>Our trending products</h2>
      <div class="grid">
        <?php
        $query = 'select * from products';
        $result = $con->query($query);

        $data = $result->fetch_array(MYSQLI_NUM);
        ?>
        <?php

        while ($row = $result->fetch_array()) {
        ?>
          <div class="card">
            <div class="card-img">
              <img src="<?php echo $row['image'] ?>" />
            </div>
            <div class="card-body">
              <h1>
                <?php
                echo $row['name'];
                ?>
              </h1>
              <div class="rate">
                <div class="star"><i class="fas fa-star"></i></div>
                <div class="star"><i class="fas fa-star"></i></div>
                <div class="star"><i class="fas fa-star"></i></div>
                <div class="star"><i class="fas fa-star"></i></div>
                <div class="star"><i class="fas fa-star-half"></i></div>
              </div>
              <p>Price <span><?php echo $row['price'] ?>ETB</span></p>
              <a href="#" class="order-btn"><i class="fas fa-shopping-cart"></i> Add to cart</a>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </section>
</body>

</html>