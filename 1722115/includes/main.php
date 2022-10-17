</head>

<body>

<header class="page-header" style="box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .1);">
    <!-- topline -->
    <div class="page-header__topline">
        <div class="container clearfix">

            <div class="currency">

                    <?php
                    if (!isset($_SESSION['customer_email'])) {
                        echo '<a class="currency__change" href="#"> Welcome : Guest</a>';
                    } else {
                        echo '<a class="currency__change" href="customer/my_orders.php"> Welcome : '. $_SESSION['customer_email'] .'</a>"';
                    }
                    ?>
            </div>

            <div class="basket">
                <a href="cart.php" class="btn" style="background-color: #333; color: gray; display: unset; vertical-align: unset; font-size: 18px; line-height: 45px; text-decoration: unset;">
                    <i class="fa fa-shopping-cart"></i>
                    <?php
                     items()
                    ?>

                </a>
            </div>


            <ul class="login">

                <li class="login__item">
                    <?php
                    if (!isset($_SESSION['customer_email'])) {
                        echo '<a href="customer_register.php" class="login__link">Register</a>';
                    } else {
                        echo '<a href="customer/my_orders.php?my_orders" class="login__link"></a>';
                    }
                    ?>
                </li>


                <li class="login__item">
                    <?php
                    if (!isset($_SESSION['customer_email'])) {
                        echo '<a href="checkout.php" class="login__link">Sign In</a>';
                    } else {
                        echo '<a href="customer/logout.php" class="login__link">Logout</a>';
                    }
                    ?>

                </li>
            </ul>

        </div>
    </div>
    <!-- bottomline -->
    <div class="page-header__bottomline" style="background-color: #FFFFFF;">
        <div class="container clearfix">

            <div class="logo">
                <a class="logo__link" href="index.php">
                    <img class="logo__img" src="images/logo.jpeg" alt="Avenue fashion logotype" width="237" height="19">
                </a>
            </div>

            <nav class="main-nav">
                <ul class="categories">

                    <li class="categories__item">
                        <a class="categories__link" href="men.php" id="men">
                            Mens

                        </a>
                    </li>

                    <li class="categories__item">
                        <a class="categories__link" href="women.php" id="women">
                            Womens

                        </a>
                    </li>

                    <li class="categories__item">
                        <a class="categories__link" href="shop.php" id="shop">
                            Shop
                        </a>
                    </li>


                    <li class="categories__item">
                        <a class="categories__link" href="" id="my_account">
                            My Account
                        </a>
                        <div class="dropdown dropdown--lookbook">
                            <div class="clearfix">
                                <div class="dropdown__half">
                                    <div class="dropdown__heading">Account Settings</div>
                                    <ul class="dropdown__items">
                                        <li class="dropdown__item">
                                            <?php

                                            if (!isset($_SESSION['customer_email'])) {
                                                echo ' <a href="checkout.php" class="dropdown__link" id="my_wishlist">My Wishlist</a>';
                                                }
                                            else{
                                                echo ' <a href="customer/my_wishlist.php" class="dropdown__link" id="my_wishlist">My Wishlist</a>';
                                            }
                                            ?>

                                            ?>
                                        </li>
                                        <li class="dropdown__item">
                                            <?php

                                            if (!isset($_SESSION['customer_email'])) {
                                                echo ' <a href="checkout.php" class="dropdown__link" id="my_order">My Orders</a>';
                                            }
                                            else{
                                                echo '  <a href="customer/my_orders.php" class="dropdown__link" id="my_order">My Orders</a>';
                                            }
                                            ?>


                                        </li>
                                        <li class="dropdown__item" style="display: none">
                                            <a href="#" class="dropdown__link">View Shopping Cart</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="dropdown__half">
                                    <div class="dropdown__heading"></div>
                                    <ul class="dropdown__items">
                                        <li class="dropdown__item" >
                                            <?php

                                            if (!isset($_SESSION['customer_email'])) {
                                                echo ' <a href="checkout.php" class="dropdown__link" id="edit_your_account">Edit Your Account</a>';
                                            }
                                            else{
                                                echo ' <a href="customer/edit_account.php" class="dropdown__link" id="edit_your_account">Edit Your Account</a>';
                                            }
                                            ?>


                                        </li>
                                        <li class="dropdown__item">
                                            <?php

                                            if (!isset($_SESSION['customer_email'])) {
                                                echo ' <a href="checkout.php"class="dropdown__link" id="change_password">Change Password</a>';
                                            }
                                            else{
                                                echo ' <a href="customer/edit_account.php"class="dropdown__link" id="change_password">Change Password</a>';
                                            }
                                            ?>
                                        </li>
                                        <li class="dropdown__item" style="display: none">
                                            <a href="#" class="dropdown__link">Delete Account</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>


                        </div>

                    </li>

                </ul>
            </nav>
        </div>
    </div>
</header>