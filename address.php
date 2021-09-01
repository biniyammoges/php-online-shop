<?php
session_start();
if (isset($_POST['submit'])) {
    $_SESSION['address'] = $_POST['address'];
    $_SESSION['phone'] = $_POST['phone'];
    $_SESSION['block'] = $_POST['block'];
    $_SESSION['dorm'] = $_POST['dorm'];
    header("Location: payment.php");
}

?>


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
    <div class="login">
        <div class="container-f">
            <div>
                <h1><i class="fas fa-map-marker-alt"></i> Your Address</h1>


                <form action="address.php" method="POST">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input id="address" name="address" type="address" placeholder="Enter address" value="<?php if ($_SESSION['address']) {
                                                                                                                    echo $_SESSION['address'];
                                                                                                                } ?>" required />
                    </div>
                    <div class="form-group">
                        <label for="email">Phone</label>
                        <input id="tel" name="phone" type="number" placeholder="Enter Phone" value="<?php if ($_SESSION['phone']) {
                                                                                                        echo $_SESSION['phone'];
                                                                                                    } ?>" required />
                    </div>
                    <div class="form-group">
                        <label for="block">Block number</label>
                        <input id="block" name="block" type="number" placeholder="Enter block" value="<?php if ($_SESSION['block']) {
                                                                                                            echo $_SESSION['block'];
                                                                                                        } ?>" required />
                    </div>
                    <div class="form-group">
                        <label for="dorm">Dorm number</label>
                        <input id="dorm" name="dorm" type="number" placeholder="Enter dorm" value="<?php if ($_SESSION['dorm']) {
                                                                                                        echo $_SESSION['dorm'];
                                                                                                    } ?>" required />
                    </div>

                    <button type="submit" name="submit" class="btn-b"><i class="fas fa-arrow-right"></i> Continue</button>
                </form>

            </div>
        </div>
    </div>
    <script src="./js/mobile.js"></script>
</body>

</html>