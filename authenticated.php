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
  <?php require('./auth.php') ?>
  <header>
    <div class="container flex">
      <a href="#" class="menu-bar">
        <svg width="24" height="15" viewBox="0 0 24 15" fill="none">
          <rect width="24" height="3" rx="1.5" fill="#C4C4C4" />
          <rect y="6" width="24" height="3" rx="1.5" fill="#C4C4C4" />
          <rect y="12" width="24" height="3" rx="1.5" fill="#C4C4C4" />
        </svg>
      </a>
      <a href="#" class="nav-brand">
        <img src="./assets/astu-logo.svg" alt="logo" />
      </a>
      <form class="search-form flex" method="POST" action="./search.php">
        <input type="text" placeholder="Search here." name="search" />
        <button type="submit"><i class="fas fa-search"></i></button>
      </form>
      <ul class="nav flex">
        <li>
          <a href="#">Products</a>
        </li>
        <li>
          <a class="cart" href="./cart.php"><i class="fas fa-shopping-cart"></i> <span>0</span> Cart</a>
        </li>
        <li>
          <a href="./order.php">Orders</a>
        </li>
        <li>
          <a href="#" class="profile"><i class="fas fa-user-circle"></i><?php echo $_SESSION['name'] ?></a>
        </li>
        <li>
          <a href="./logout.php" class="logout">
            <i class="fas fa-sign-out-alt"></i>Logout</a>
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
              <a id="<?php echo $row['id'] ?>" name="<?php echo $row['name'] ?>" price="<?php echo $row['price'] ?>" image="<?php echo $row['image'] ?>" href="#" class="order-btn"><i class="fas fa-shopping-cart"></i> Add to cart</a>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </section>
  <script src="./js/main.js"></script>
</body>

</html>