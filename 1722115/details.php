<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

?>

<?php


$product_id = @$_GET['product'];

$get_product = "select * from products where product_id='$product_id'";

$run_product = mysqli_query($con, $get_product);

$check_product = mysqli_num_rows($run_product);

if ($check_product == 0) {

    echo "<script> window.open('index.php','_self') </script>";

} else {


    $row_product = mysqli_fetch_array($run_product);

    $p_cat_id = $row_product['p_cat_id'];

    $pro_id = $row_product['product_id'];

    $pro_title = $row_product['product_title'];

    $pro_price = $row_product['product_price'];

    $pro_desc = $row_product['product_desc'];

    $pro_img1 = $row_product['product_img1'];

    $pro_img2 = $row_product['product_img2'];

    $pro_img3 = $row_product['product_img3'];

    $pro_img4 = $row_product['product_img4'];

    $pro_img5 = $row_product['product_img5'];

    $pro_psp_price = $row_product['product_psp_price'];

    $status = $row_product['status'];


    $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";

    $run_p_cat = mysqli_query($con, $get_p_cat);

    $row_p_cat = mysqli_fetch_array($run_p_cat);

    $p_cat_title = $row_p_cat['p_cat_title'];


    ?>

    <main>
        <!-- HERO -->
        <div class="nero">
            <div class="nero__heading">
                <span class="nero__bold">Product </span>View
            </div>
            <p class="nero__text">
            </p>
        </div>
    </main>

    <div id="content"><!-- content Starts -->
        <div class="container"><!-- container Starts -->


            <div class="col-md-12"><!-- col-md-12 Starts -->

                <div class="row" id="productMain"><!-- row Starts -->

                    <div class="col-sm-6"><!-- col-sm-6 Starts -->

                        <div id="mainImage"><!-- mainImage Starts -->
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <?php

                                    if (!ctype_alnum($pro_img1)) {
                                        echo("<div class='carousel-item active'>
                                                        <img class='d-block w-100' src='admin_area/product_images/$pro_img1' alt='First slide'>
                                                   </div>");
                                    }
                                    ?>
                                    <?php
                                    if (!ctype_alnum($pro_img2)) {
                                        echo("<div class='carousel-item'>
                                                            <img class='d-block w-100' src='admin_area/product_images/$pro_img2' alt='Second slide'>
                                                        </div>");
                                    }
                                    ?>
                                    <?php
                                    if (!ctype_alnum($pro_img3)) {
                                        echo("<div class='carousel-item'>
                                                            <img class='d-block w-100' src='admin_area/product_images/$pro_img3' alt='Third slide'>
                                                        </div>");
                                    }
                                    ?>
                                    <?php
                                    if (!ctype_alnum($pro_img4)) {
                                        echo("<div class='carousel-item'>
                                                            <img class='d-block w-100' src='admin_area/product_images/$pro_img4' alt='Forth slide'>
                                                        </div>");
                                    }
                                    ?>
                                    <?php
                                    if (!ctype_alnum($pro_img5)) {
                                        echo("<div class='carousel-item'>
                                                            <img class='d-block w-100' src='admin_area/product_images/$pro_img5' alt='Fifth slide'>
                                                        </div>");
                                    }
                                    ?>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleControls" data-bs-slide="prev"
                                        style="margin: 0;position: absolute;top: 50%;-ms-transform: translateY(-50%);transform: translateY(-50%);height: fit-content; width: fit-content;">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleControls" data-bs-slide="next"
                                        style="margin: 0;position: absolute;top: 50%;-ms-transform: translateY(-50%);transform: translateY(-50%);height: fit-content; width: fit-content;">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                </button>
                            </div>

                        </div><!-- mainImage Ends -->

                    </div><!-- col-sm-6 Ends -->


                    <div class="col-sm-6"><!-- col-sm-6 Starts -->

                        <div class="box"><!-- box Starts -->

                            <h1 class="text-center"> <?php echo $pro_title; ?> </h1>

                            <?php


                            if (isset($_POST['add_cart'])) {

                                $ip_add = getRealUserIp();

                                $p_id = $pro_id;

                                $product_qty = $_POST['product_qty'];

                                if ($product_qty == 0) {
                                    echo "<script>alert('Please  select the  quantity')</script>";
                                }


                                $product_size = $_POST['product_size'];

                                if ($product_size == 0) {
                                    echo "<script>alert('Please  select the  size')</script>";
                                }

                                if ($product_qty > 0 && $product_size > 0) {
                                    $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";

                                    $run_check = mysqli_query($con, $check_product);

                                    if (mysqli_num_rows($run_check) > 0) {

                                        echo "<script>alert('This Product is already added in cart')</script>";


                                    } else {

                                        $get_price = "select * from products where product_id='$p_id'";

                                        $run_price = mysqli_query($con, $get_price);

                                        $row_price = mysqli_fetch_array($run_price);

                                        $pro_price = $row_price['product_price'];

                                        $pro_psp_price = $row_price['product_psp_price'];


                                        $product_price = $pro_psp_price;

                                        $product_price = str_replace(',', '', $product_price);

                                        $query = "insert into cart (p_id,ip_add,qty,p_price,size) values ('$p_id','$ip_add','$product_qty','$product_price','$product_size')";

                                        $run_query = mysqli_query($db, $query);

                                        echo("<meta http-equiv='refresh' content='1'>"); //Refresh by HTTP 'meta'
                                    }

                                }
                            }


                            ?>

                            <form action="" method="post" class="form-horizontal"><!-- form-horizontal Starts -->

                                <?php

                                if ($status == "product") {

                                    ?>

                                    <div class="form-group"><!-- form-group Starts -->

                                        <label class="col-md-5 control-label">Product Quantity </label>

                                        <div class="col-md-7"><!-- col-md-7 Starts -->

                                            <select name="product_qty" class="form-control" required>

                                                <option value='0'>Select quantity</option>
                                                <option value='1'>1</option>
                                                <option value='2'>2</option>
                                                <option value='3'>3</option>
                                                <option value='4'>4</option>
                                                <option value='5'>5</option>


                                            </select>

                                        </div><!-- col-md-7 Ends -->

                                    </div><!-- form-group Ends -->

                                    <div class="form-group"><!-- form-group Starts -->

                                        <label class="col-md-5 control-label">Product Size</label>

                                        <div class="col-md-7"><!-- col-md-7 Starts -->

                                            <select name="product_size" class="form-control">

                                                <option value='0'>Select a Size</option>
                                                <option value='small'>Small</option>
                                                <option value='medium'>Medium</option>
                                                <option value='large'>Large</option>


                                            </select>

                                        </div><!-- col-md-7 Ends -->


                                    </div><!-- form-group Ends -->

                                <?php } else { ?>


                                    <div class="form-group"><!-- form-group Starts -->

                                        <label class="col-md-5 control-label">Bundle Quantity </label>

                                        <div class="col-md-7"><!-- col-md-7 Starts -->

                                            <select name="product_qty" class="form-control">

                                                <option>Select quantity</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>


                                            </select>

                                        </div><!-- col-md-7 Ends -->

                                    </div><!-- form-group Ends -->

                                    <div class="form-group"><!-- form-group Starts -->

                                        <label class="col-md-5 control-label">Bundle Size</label>

                                        <div class="col-md-7"><!-- col-md-7 Starts -->

                                            <select name="product_size" class="form-control">

                                                <option>Select a Size</option>
                                                <option>Small</option>
                                                <option>Medium</option>
                                                <option>Large</option>


                                            </select>

                                        </div><!-- col-md-7 Ends -->


                                    </div><!-- form-group Ends -->


                                <?php } ?>


                                <?php

                                echo "<p style='text-align: center;font-size: medium;'>$pro_desc</p>";

                                if ($status == "product") {
                                    echo "
                                            <p class='price'>
                                            
                                            <del> ৳$pro_price </del> | ৳$pro_psp_price
                                            
                                            </p>
                                            ";
                                }
                                ?>

                                <p class="text-center buttons"><!-- text-center buttons Starts -->

                                    <button class="btn btn-danger" type="submit" name="add_cart">

                                        <i class="fa fa-shopping-cart"></i> Add to Cart

                                    </button>

                                    <button class="btn btn-warning" type="submit" name="add_wishlist">

                                        <i class="fa fa-heart"></i> Add to Wishlist

                                    </button>


                                    <?php

                                    if (isset($_POST['add_wishlist'])) {

                                        if (!isset($_SESSION['customer_email'])) {

                                            echo "<script>alert('You Must Login To Add Product In Wishlist')</script>";

                                            echo "<script>window.open('checkout.php','_self')</script>";

                                        } else {

                                            $customer_session = $_SESSION['customer_email'];

                                            $get_customer = "select * from customers where customer_email='$customer_session'";

                                            $run_customer = mysqli_query($con, $get_customer);

                                            $row_customer = mysqli_fetch_array($run_customer);

                                            $customer_id = $row_customer['customer_id'];

                                            $select_wishlist = "select * from wishlist where customer_id='$customer_id' AND product_id='$pro_id'";

                                            $run_wishlist = mysqli_query($con, $select_wishlist);

                                            $check_wishlist = mysqli_num_rows($run_wishlist);

                                            if ($check_wishlist == 1) {

                                                echo "<script>alert('This Product Has Been already Added In Wishlist')</script>";


                                            } else {

                                                $insert_wishlist = "insert into wishlist (customer_id,product_id) values ('$customer_id','$pro_id')";

                                                $run_wishlist = mysqli_query($con, $insert_wishlist);

                                                if ($run_wishlist) {

                                                    echo "<script> alert('Product Has Inserted Into Wishlist') </script>";


                                                }

                                            }

                                        }

                                    }

                                    ?>

                                </p><!-- text-center buttons Ends -->

                            </form><!-- form-horizontal Ends -->

                        </div><!-- box Ends -->

                    </div><!-- col-sm-6 Ends -->


                </div><!-- row Ends -->

                <div class="row"><!-- row same-height-row Starts -->

                    <?php

                    if ($status == "product") {


                        ?>

                        <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Starts -->

                            <div class="box same-height headline"><!-- box same-height headline Starts -->

                                <h3 class="text-center"> You may also like these Products: We provide you top 3 product
                                    items. </h3>

                            </div><!-- box same-height headline Ends -->

                        </div><!-- col-md-3 col-sm-6 Ends -->

                        <?php

                        $get_products = "select * from products order by rand() LIMIT 0,3";

                        $run_products = mysqli_query($con, $get_products);

                        while ($row_products = mysqli_fetch_array($run_products)) {

                            $pro_id = $row_products['product_id'];

                            $pro_title = $row_products['product_title'];

                            $pro_price = $row_products['product_price'];

                            $pro_img1 = $row_products['product_img1'];

                            $manufacturer_id = $row_products['manufacturer_id'];

                            $get_manufacturer = "select * from manufacturers where manufacturer_id='$manufacturer_id'";

                            $run_manufacturer = mysqli_query($db, $get_manufacturer);

                            $row_manufacturer = mysqli_fetch_array($run_manufacturer);

                            $manufacturer_name = $row_manufacturer['manufacturer_title'];

                            $pro_psp_price = $row_products['product_psp_price'];


                            echo "

<div class='col-md-3 col-sm-6 center-responsive' >

<div class='product' >

<img src='admin_area/product_images/$pro_img1' class='img-responsive' >


<div class='text' >

<center>

<p class='btn btn-warning'> $manufacturer_name </p>

</center>

<hr>

<h3>$pro_title</h3>

<p class='price' > <del> ৳$pro_price </del> | ৳$pro_psp_price </p>

<p class='buttons' >

<a href='details.php?product=$product_id' class='btn btn-default' >View Details</a>

<a href='details.php?product=$product_id' class='btn btn-danger'>

<i class='fa fa-shopping-cart'></i> Add To Cart

</a>


</p>

</div>



</div>

</div>

";


                        }


                        ?>

                    <?php } else { ?>

                        <div class="box same-height"><!-- box same-height Starts -->

                            <h3 class="text-center"> Bundle Products </h3>

                        </div><!-- box same-height Ends -->

                        <?php

                        $get_bundle_product_relation = "select * from bundle_product_relation where bundle_id='$pro_id'";

                        $run_bundle_product_relation = mysqli_query($con, $get_bundle_product_relation);

                        while ($row_bundle_product_relation = mysqli_fetch_array($run_bundle_product_relation)) {

                            $bundle_product_relation_product_id = $row_bundle_product_relation['product_id'];

                            $get_products = "select * from products where product_id='$bundle_product_relation_product_id'";


                            $run_products = mysqli_query($con, $get_products);

                            while ($row_products = mysqli_fetch_array($run_products)) {
                                $pro_id = $row_products['product_id'];

                                $pro_title = $row_products['product_title'];

                                $pro_price = $row_products['product_price'];

                                $pro_img1 = $row_products['product_img1'];

                                $manufacturer_id = $row_products['manufacturer_id'];

                                $get_manufacturer = "select * from manufacturers where manufacturer_id='$manufacturer_id'";

                                $run_manufacturer = mysqli_query($db, $get_manufacturer);

                                $row_manufacturer = mysqli_fetch_array($run_manufacturer);

                                $manufacturer_name = $row_manufacturer['manufacturer_title'];

                                $pro_psp_price = $row_products['product_psp_price'];


                                echo "

<div class='col-md-3 col-sm-6 center-responsive' >

<div class='product' >

<img src='admin_area/product_images/$pro_img1' class='img-responsive' >


<div class='text' >

<center>

<p class='btn btn-warning'> $manufacturer_name </p>

</center>

<hr>

<h3>$pro_title</h3>

<p class='price' > <del> ৳$pro_price </del> | ৳$pro_psp_price </p>

<p class='buttons' >

<a href='details.php?product=$product_id' class='btn btn-default' >View Details</a>

<a href='details.php?product=$product_id' class='btn btn-danger'>

<i class='fa fa-shopping-cart'></i> Add To Cart

</a>


</p>

</div>



</div>

</div>

";


                            }


                        }


                        ?>


                    <?php } ?>

                </div><!-- row same-height-row Ends -->

            </div><!-- col-md-12 Ends -->


        </div><!-- container Ends -->
    </div><!-- content Ends -->


    <?php

    include("includes/footer.php");

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
            integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
            integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK"
            crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.carousel').carousel({
                interval: 2000
            });
        });

    </script>

    </body>
    </html>

<?php } ?>
