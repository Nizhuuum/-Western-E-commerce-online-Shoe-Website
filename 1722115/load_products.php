<?php

 $total_item = $_POST['total_item'];
 $end  = $_POST['end'];


class Product {
    // Properties
    public $product_id;
    public $cat_title;
    public $p_cat_title;
    public $product_title;
    public $product_img1;
    public $product_img2;
    public $product_img3;
    public $product_img4;
    public $product_img5;
    public $product_price;
    public $product_psp_price;
    public $product_desc;
    public $product_review;
    public $status;
    public $manufacturer_title;


    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param mixed $product_id
     */
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
    }

    /**
     * @return mixed
     */
    public function getPCatId()
    {
        return $this->p_cat_id;
    }

    /**
     * @param mixed $p_cat_id
     */
    public function setPCatId($p_cat_id)
    {
        $this->p_cat_id = $p_cat_id;
    }

    /**
     * @return mixed
     */
    public function getProductTitle()
    {
        return $this->product_title;
    }

    /**
     * @param mixed $product_title
     */
    public function setProductTitle($product_title)
    {
        $this->product_title = $product_title;
    }

    /**
     * @return mixed
     */
    public function getProductImg1()
    {
        return $this->product_img1;
    }

    /**
     * @param mixed $product_img1
     */
    public function setProductImg1($product_img1)
    {
        $this->product_img1 = $product_img1;
    }

    /**
     * @return mixed
     */
    public function getProductImg2()
    {
        return $this->product_img2;
    }

    /**
     * @param mixed $product_img2
     */
    public function setProductImg2($product_img2)
    {
        $this->product_img2 = $product_img2;
    }

    /**
     * @return mixed
     */
    public function getProductImg3()
    {
        return $this->product_img3;
    }

    /**
     * @param mixed $product_img3
     */
    public function setProductImg3($product_img3)
    {
        $this->product_img3 = $product_img3;
    }

    /**
     * @return mixed
     */
    public function getProductImg4()
    {
        return $this->product_img4;
    }

    /**
     * @param mixed $product_img4
     */
    public function setProductImg4($product_img4)
    {
        $this->product_img4 = $product_img4;
    }

    /**
     * @return mixed
     */
    public function getProductImg5()
    {
        return $this->product_img5;
    }

    /**
     * @param mixed $product_img5
     */
    public function setProductImg5($product_img5)
    {
        $this->product_img5 = $product_img5;
    }

    /**
     * @return mixed
     */
    public function getProductPrice()
    {
        return $this->product_price;
    }

    /**
     * @param mixed $product_price
     */
    public function setProductPrice($product_price)
    {
        $this->product_price = $product_price;
    }

    /**
     * @return mixed
     */
    public function getProductPspPrice()
    {
        return $this->product_psp_price;
    }

    /**
     * @param mixed $product_psp_price
     */
    public function setProductPspPrice($product_psp_price)
    {
        $this->product_psp_price = $product_psp_price;
    }

    /**
     * @return mixed
     */
    public function getProductDesc()
    {
        return $this->product_desc;
    }

    /**
     * @param mixed $product_desc
     */
    public function setProductDesc($product_desc)
    {
        $this->product_desc = $product_desc;
    }

    /**
     * @return mixed
     */
    public function getProductReview()
    {
        return $this->product_review;
    }

    /**
     * @param mixed $product_review
     */
    public function setProductReview($product_review)
    {
        $this->product_review = $product_review;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getCatTitle()
    {
        return $this->cat_title;
    }

    /**
     * @param mixed $cat_title
     */
    public function setCatTitle($cat_title)
    {
        $this->cat_title = $cat_title;
    }

    /**
     * @return mixed
     */
    public function getPCatTitle()
    {
        return $this->p_cat_title;
    }

    /**
     * @param mixed $p_cat_title
     */
    public function setPCatTitle($p_cat_title)
    {
        $this->p_cat_title = $p_cat_title;
    }

    /**
     * @return mixed
     */
    public function getManufacturerTitle()
    {
        return $this->manufacturer_title;
    }

    /**
     * @param mixed $manufacturer_title
     */
    public function setManufacturerTitle($manufacturer_title)
    {
        $this->manufacturer_title = $manufacturer_title;
    }



}

$db = mysqli_connect("localhost", "root", "", "nafees_shoes", 3306);


$get_products = "select * from nafees_shoes.products LIMIT $total_item OFFSET $end;";

$run_products = mysqli_query($db, $get_products);


$products_array=array();

while ($row_products = mysqli_fetch_array($run_products)) {
    $product = new Product();

    $product->setProductId($row_products['product_id']);
    $product->setProductTitle($row_products['product_title']);
    $product->setProductImg1($row_products['product_img1']);
    $product->setProductImg2($row_products['product_img2']);
    $product->setProductImg3($row_products['product_img3']);
    $product->setProductImg4($row_products['product_img4']);
    $product->setProductImg5($row_products['product_img5']);
    $product->setProductPrice($row_products['product_price']);
    $product->setProductPspPrice($row_products['product_psp_price']);
    $product->setProductDesc($row_products['product_desc']);
    $product->setProductReview($row_products['product_review']);
    $product->setStatus($row_products['status']);

    $manufacturer_id = $row_products['manufacturer_id'];
    $manufacturer_name_query = "select manufacturer_title from nafees_shoes.manufacturers where manufacturer_id = $manufacturer_id";
    $run_manufacturer_name = mysqli_query($db, $manufacturer_name_query);
    $row_manufacturer_name = mysqli_fetch_array($run_manufacturer_name);
    $product->setManufacturerTitle($row_manufacturer_name['manufacturer_title']);


    $p_cat_id = $row_products['p_cat_id'];
    $p_cat_name_query = "select p_cat_title from nafees_shoes.product_categories where p_cat_id = $p_cat_id";
    $run_p_cat_name = mysqli_query($db, $p_cat_name_query);
    $row_p_cat_name = mysqli_fetch_array($run_p_cat_name);
    $product->setPCatTitle($row_p_cat_name['p_cat_title']);

    $cat_id = $row_products['cat_id'];
    $cat_title_query = "select cat_title from nafees_shoes.categories where cat_id = $cat_id";
    $run_cat_title = mysqli_query($db, $cat_title_query);
    $row_cat_title = mysqli_fetch_array($run_cat_title);
    $product->setCatTitle($row_cat_title['cat_title']);



    array_push($products_array,$product);
}

    echo json_encode($products_array);
?>
