<?php

$db = mysqli_connect("localhost", "root", "", "nafees_shoes", 3306);


$men_query = "select cat_id from nafees_shoes.categories WHERE cat_title = 'Women'";
$run_men = mysqli_query($db, $men_query);
$row_men = mysqli_fetch_array($run_men);

$men_id = $row_men['cat_id'];


$get_products = "select product_id from nafees_shoes.products where cat_id = $men_id;";

$run_products = mysqli_query($db, $get_products);

$count = 0;

while ($row_products = mysqli_fetch_array($run_products)) {
    $count = $count + 1;
}

echo json_encode($count);


?>