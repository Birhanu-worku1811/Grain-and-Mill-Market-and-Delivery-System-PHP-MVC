<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title><?php echo $data['page_title']?> | Grain Mill Market and Delivery</title>
    <!-- Style Sheet -->
    <link rel="stylesheet" type="text/css" href="<?= ASSETS.THEME ?>CSS/market.css"/>
    <link rel="stylesheet" type="text/css" href="<?= ASSETS.THEME ?>CSS/account.css" />
    <link rel="stylesheet" type="text/css" href="<?= ASSETS.THEME ?>CSS/checkout.css"/>
    <link rel="stylesheet" type="text/css" href="<?= ASSETS.THEME ?>CSS/global.css"/>
    <link rel="stylesheet" type="text/css" href="<?= ASSETS.THEME ?>CSS/header.css">
    <link rel="stylesheet" type="text/css" href="<?= ASSETS.THEME ?>CSS/cart.css"/>
    <link rel="stylesheet" type="text/css" href="<?= ASSETS.THEME ?>CSS/index.css"/>
    <link rel="stylesheet" type="text/css" href="<?= ASSETS.THEME ?>CSS/footer.css"/>
</head>

<style>
    .profile-picture {
        width: 50px; /* Set the width of the profile picture container */
        height: 50px; /* Set the height of the profile picture container */
        overflow: hidden; /* Hide any part of the image that exceeds the container size */
        border-radius: 50%; /* Make the profile picture round */
        margin-right: 10px; /* Add some space to the right of the profile picture */
    }

    .profile-picture img {
        max-width: 100%; /* Set the maximum width of the image to the container width */
        max-height: 100%; /* Set the maximum height of the image to the container height */
        object-fit: cover; /* Scale the image to cover the entire container */
    }
    .dropdown-menu button {
        background: none;
        border: none;
        padding: 0;
        /* Add the following styles to remove borders */
        border-style: none;
        outline: none;
        background-color: rgba(30, 30, 30, 0.5);
    }
</style>
<header>
    <div class="container">
        <div class="brand">
            <div class="logo">
                    <a href="<?=ROOT ?>index">
                        <img src="<?= ASSETS.THEME ?>img/icons/gm-logo.png">
                        <div class="logo-text">
                            <p class="big-logo">GrainMill</p>
                            <p class="small-logo">Market&Delivery</p>
                        </div>
                    </a>
            </div> <!-- logo -->
            <div class="shop-icon">
                <?php
                if (isset($data['user_data'])):
                ?>
                <div class="dropdown">
                    <div class="profile-picture">
                         <img src="<?= ASSETS.THEME ?>img/icons/account.png" alt="Profile Picture">
                    </div>
                    <div class="dropdown-menu wishlist-item">
                        <a href="<?= ROOT?>account">
                            <?php
                            echo $data['user_data']->username."<br>";
                            echo $data['user_data']->Email;
                            ?>
                        </a>

                        <ul>
                            <li><a href="<?=ROOT ?>orders">My Orders</a></li>
                            <li><a href="<?=ROOT ?>logout">Log Out</a></li>
                        </ul>
                    </div>
                </div>
                <?php
                endif;
                ?>
                <div class="dropdown">
                    <img src="<?= ASSETS.THEME ?>img/icons/shopping_cart.png">
                    <div class="dropdown-menu">
                        <button style="color: green"> <a href="<?=ROOT ?>cart"> Go To Cart</a></button>
                    </div>
                </div>
            </div> <!-- shop icons -->
        </div> <!-- brand -->

        <div class="menu-bar">
            <div class="menu">
                <ul>
                    <li><a href="<?=ROOT ?>index">HOME</a></li>
                    <li><a href="<?=ROOT ?>market">Market</a></li>
                    <li><a href="<?=ROOT ?>orders">My Orders</a></li>
                    <li><a href="<?=ROOT ?>contact">Contact</a></li>
                    <li><a href="<?=ROOT ?>about">About us</a></li>
                    <?php
                    if (!isset($data['user_data'])){
                        ?>
                        <li><a href="<?=ROOT ?>register">Register</a></li>
                        <li><a href="<?=ROOT ?>login">SIGN IN</a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="search-bar">
                <form action="<?=ROOT ?>market" method="get">
                    <div class="form-group">
                        <input type="text" class="form-control" name="search" id="searchInput" placeholder="Search products">
                        <button type="submit" name="submit" style="background: none; border: none; padding: 0;">
                            <img src="<?= ASSETS.THEME ?>img/icons/search.png" id="searchIcon" alt="Search">
                        </button>
                    </div>
                </form>
            </div>
        </div> <!-- menu -->
    </div> <!-- container -->
</header> <!-- header -->

