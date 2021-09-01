  <?php
  session_start();
  require('./guest.php');

  function array_column_manual($array, $column)
  {
    $newarr = array();
    foreach ($array as $row) $newarr[] = $row[$column];
    return $newarr;
  }

  if (isset($_POST['add'])) {
    if (isset($_SESSION['cart'])) {
      $item_array_id = array_column_manual($_SESSION['cart'], "product_id");
      if (in_array($_POST['product_id'], $item_array_id)) {
        echo '<script> alert("product already exist in cart") </script>';
        echo '<script> window.location = "index.php" </script>';
      } else {
        $count = count($_SESSION['cart']);
        $item_array = array('product_id' => $_POST['product_id']);
        $_SESSION['cart'][$count] = $item_array;
      }
    } else {
      $item_array = array('product_id' => $_POST['product_id']);
      $_SESSION['cart'][0] = $item_array;
    }
  }

  ?>


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
                <!-- <a id="<?php echo $row['id'] ?>" name="<?php echo $row['name'] ?>" price="<?php echo $row['price'] ?>" image="<?php echo $row['image'] ?>" href="#" class="order-btn"><i class="fas fa-shopping-cart"></i> Add to cart</a> -->
                <form id="add-to-cart" method="POST">
                  <input type="hidden" name="product_id" value="<?php echo $row['id'] ?>">
                  <button type="submit" class="order-btn" name="add"><i class="fas fa-shopping-cart"></i> Add to cart</button>
                </form>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </section>
    <!-- <script src="./js/main.js"></script> -->
    <script src="./js/mobile.js"></script>

  </body>

  </html>