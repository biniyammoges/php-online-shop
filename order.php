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
            <a href="./authenticated.php" class="nav-brand">
                <img src="./assets/astu-logo.svg" alt="logo" />
            </a>
            <form class="search-form flex" method="POST" action="./search.php">
                <input type="text" placeholder="Search here." name="search" />
                <button type="submit"><i class="fas fa-search"></i></button>
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

    <section class="order_sec">
        <div class="container">
            <h1>Recently ordered products</h1>
            <div class="orders">
                <table>
                    <tr>
                        <th><i class="fas fa-map-marker-alt"></i> Address</th>
                        <th>Dorm</th>
                        <th><i class="fas fa-bed"></i> Room</th>
                        <th><i class="fas fa-phone"></i> Phone</th>
                        <th><i class="fas fa-dollar-sign"></i> Payment</th>
                        <th><i class="fas fa-clock"></i> Ordered_date</th>
                        <th>Status</th>
                    </tr>
                    <?php
                    $user_id = $_SESSION['id'];
                    $sql = "select * from orders, user where orders.user_id = user.id and user.id = $user_id";

                    $result = $con->query($sql);
                    if ($result) {
                        while ($row = $result->fetch_array()) {
                            echo   "<tr>
                            <td>$row[address]</td>
                            <td>$row[block]</td>
                            <td>$row[dorm]</td>
                            <td>+251$row[phone]</td>
                            <td>$row[payment_method]</td>
                        <td>$row[date]</td>
                        <td class='status'> <span><i class='fas fa-check'></i></span></td>
                    </tr>";
                        }
                    } else {
                        echo "Error: " . $sql . "<br>" . $con->error;
                    }

                    ?>

                </table>
            </div>
    </section>
    <script src="./js/mobile.js"></script>

</body>

</html>