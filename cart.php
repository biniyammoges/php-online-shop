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
                    <a href="#">Products</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-shopping-cart"></i> Cart</a>
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
    <?php require('./db.php') ?>

    <section class="cart_sec">
        <div class="container">
            <h1>Shopping Cart</h1>
            <div class="flex">
                <div class="cart">
                    <div class="cart-item flex">
                        <div class="cart-img">
                            <img src="./assets/atikilt.jpg" alt="">
                        </div>
                        <h1>Atikilt</h1>
                        <p class="price">70ETB</p>
                        <div class="qty flex">
                            <button class="minus"><i class="fas fa-minus"></i></button>
                            <span>2</span>
                            <button class="plus"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="cart-item flex">
                        <div class="cart-img">
                            <img src="./assets/atikilt.jpg" alt="">
                        </div>
                        <h1>Atikilt</h1>
                        <p class="price">70ETB</p>
                        <div class="qty flex">
                            <button class="minus"><i class="fas fa-minus"></i></button>
                            <span>2</span>
                            <button class="plus"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="cart-item flex">
                        <div class="cart-img">
                            <img src="./assets/atikilt.jpg" alt="">
                        </div>
                        <h1>Atikilt</h1>
                        <p class="price">70ETB</p>
                        <div class="qty flex">
                            <button class="minus"><i class="fas fa-minus"></i></button>
                            <span>2</span>
                            <button class="plus"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="cart-item flex">
                        <div class="cart-img">
                            <img src="./assets/atikilt.jpg" alt="">
                        </div>
                        <h1>Atikilt</h1>
                        <p class="price">70ETB</p>
                        <div class="qty flex">
                            <button class="minus"><i class="fas fa-minus"></i></button>
                            <span>2</span>
                            <button class="plus"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                </div>
                <div class="checkout">
                    <div class="card">
                        <h1>Checkout</h1>
                        <p class="delivery">Delivery <span>FREE</span></p>
                        <p class="price">total price <span>300ETB</span></p>
                        <a href="./address.php" class="btn"><i class="fas fa-arrow-right"></i> Proceed </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>