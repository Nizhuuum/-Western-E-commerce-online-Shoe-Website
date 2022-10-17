<?php
$db = mysqli_connect("localhost", "root", "", "nafees_shoes", 3306);


$get_products = "select product_id from nafees_shoes.products;";

$run_products = mysqli_query($db, $get_products);

$count = 0;

while ($row_products = mysqli_fetch_array($run_products)) {
    $count = $count +1;
}

echo json_encode($count);

?>