<?php


session_start();
require('./db.php');

if (isset($_POST['cash'])) {
    $address = $_SESSION['address'];
    $phone = $_SESSION['phone'];
    $block = $_SESSION['block'];
    $dorm = $_SESSION['dorm'];
    $user_id = $_SESSION['id'];

    $sql = "insert into orders
    (address, phone, block, dorm, user_id) values ('$address', $phone, $block, $dorm, $user_id)";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $product_id = mysqli_insert_id($con);
        foreach ($_SESSION['cart'] as $key => $value) {
            $add_product_query = "insert into ordered_items (product_id, order_id) values ($value[product_id], $product_id)";
            $res = mysqli_query($con, $add_product_query);
            if (!$res) {
                echo "Error: " . $sql . "<br>" . $con->error;
            }
            $_SESSION['cart'] = [];
            header("Location: order.php");
        }
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Choose payment method</title>
    <link rel="stylesheet" href="./style.css" />
    <link rel="stylesheet" href="./css/all.css" />
</head>

<?php require('./auth.php') ?>

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
            <form class="search-form flex" method="POST" action="">
                <input type="text" placeholder="Search here." name="search" />
                <button type="submit" name="sub"><i class="fas fa-search"></i></button>
            </form>
            <ul class="nav flex">
                <li>
                    <a href="./index.php">Products</a>
                </li>
                <li>
                    <a href="./order.php">Orders</a>
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
                    <a href="#" class="profile"><i class="fas fa-user-circle"></i><?php echo $_SESSION['name'] ?></a>
                </li>
                <li>
                    <a href="./logout.php" class="logout">
                        <i class="fas fa-sign-out-alt"></i>Logout</a>
                </li>
            </ul>
        </div>
    </header>
    <div class="login payment">
        <div class="container-f">
            <div>
                <h2>Select payment method</h2>
                <form action="" method="POST">
                    <button type="submit" name="cash" class="cash"><i class="fas fa-dollar-sign"></i> Cash</button>
                    <a href="#" class="paypal" class="btn" disable><i class="fab fa-paypal"></i> Paypal</a>
                    <span> * not available yet!</span>
                    <a href="#" class="cbe" class="btn" disable>CBE</a>
                    <span> * not available yet!</span>

                </form>

            </div>
        </div>
    </div>
    <script src="./js/mobile.js"></script>

</body>

</html>