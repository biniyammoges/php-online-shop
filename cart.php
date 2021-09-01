<?php session_start();

if (isset($_POST['remove'])) {
    if ($_GET['action'] == 'remove') {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['product_id'] == $_GET['id']) {
                unset($_SESSION['cart'][$key]);
            }
        }
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

    <section class="cart_sec">
        <div class="container">
            <h1>Shopping Cart</h1>
            <?php
            if ($count == 0) {
                echo '<h4>Your cart is empty. please choose product</h4>';
            }
            ?>
            <div class="flex">
                <div class="cart">
                    <?php
                    $query = 'select * from products';
                    $result = $con->query($query);
                    $product_id = array_column($_SESSION['cart'], 'product_id');
                    $total = 0;
                    $count = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        foreach ($product_id as $id) {
                            if ($row['id'] == $id) {
                                $total = $total + $row['price'];
                                $count = $count + 1;
                                echo "                    <div class='cart-item flex'>
                                <div class='cart-img'>
                                    <img src='$row[image]' alt=''>
                                </div>
                                <div class='cart-detail'>
                                    <h1>$row[name]</h1>
                                    <p class='price'>$row[price]ETB</p>
                                    <form action='cart.php?action=remove&id=$row[id]' method='POST'>
                                    <button type='submit' name='remove' class='remove-cart'><i class='fas fa-trash'></i> Remove</button>
                                    </form>
                                </div>
                                <div class='qty flex'>
                                <span>1</span>
                                </div>
                                </div>";
                            }
                        }
                    }

                    ?>


                </div>
                <div class="checkout">
                    <div class="card">
                        <h1>Checkout</h1>
                        <p class="delivery">Delivery <span>FREE</span></p>
                        <p class="price">total price ( <?php echo $count ?> items ) : <span><?php echo "$total ETB" ?></span></p>
                        <a href="./address.php" class="btn"><i class="fas fa-arrow-right"></i> Proceed </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="./js/mobile.js"></script>

</body>

</html>