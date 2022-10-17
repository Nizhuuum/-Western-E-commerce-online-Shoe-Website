<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

?>

<link href="css/style.css" rel="stylesheet" xmlns="">

<!-- MAIN -->
<main>
    <!-- HERO -->
    <div class="nero2">
        <div class="nero__heading">
            <span class="nero__bold">women</span> PRODUCTS
        </div>
        <p class="nero__text">
        </p>
    </div>
</main>

<div id="product_container"></div>

<div class="d-flex justify-content-center" style="margin-top: 10px; margin-bottom: 10px">
    <div class="pagination" id="pagination">

    </div>
</div>

<?php

include("includes/footer.php");

?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="js/script.js"></script>
<script src="js/category_active.js"></script>

<script>
    $( document ).ready(function() {
        let total_products;
        let endNumber = 0;

        $.ajax({
            url:"women_count_products.php",
            method:"GET",
            dataType: 'json',
            success:function(data){
                total_products = data;
                for(var i = 0; i<Math.ceil(data/10); i++){

                    if(i == 0 ) {
                        $("#pagination").append(` <a class="my_page_no active">${i + 1}</a>`);
                    }
                    else{
                        $("#pagination").append(` <a class="my_page_no">${i + 1}</a>`);
                    }
                }

            },
            error: function(ts) {
                console.log(ts.responseText);
            }
        });

        $.ajax({
            url:"women_load_products.php",
            method:"POST",
            dataType: 'json',
            data: { total_item: 10, end:0 },
            success:function(data){
                load_all_products(data);
            },
            error: function(ts) {
                console.log(ts);
                console.log(ts.responseText);
            }
        });
        $(document).on('click', '.my_page_no', function () {
            // your function here
            event.preventDefault();
            var text = jQuery(this).text(); // 'this' refers to the h3 element that you clicked.. not the div with the class .results

            $("#pagination").empty();

            for(var i = 0; i<Math.ceil(total_products/10); i++){

                if(i+1 === parseInt(text) ) {
                    $("#pagination").append(`<a class="my_page_no active">${i + 1}</a>`);
                }
                else{
                    $("#pagination").append(`<a class="my_page_no">${i + 1}</a>`);
                }
            }

            $("#product_container").empty();

            load_all_products_ajax_call((parseInt(text)*10)-10);

        });


        function load_all_products_ajax_call(endNumber){
            $.ajax({
                url:"load_products.php",
                method:"POST",
                dataType: 'json',
                data: { total_item: 10, end:endNumber },
                success:function(data){
                    load_all_products(data);
                },
                error: function(ts) {
                    console.log(ts);
                    console.log(ts.responseText);
                }
            });
        }
        function load_all_products(product_data){
            let id_number = 1;
            for(var i = 0; i<Math.ceil(product_data.length/5); i++){
                $("#product_container").append(`<div class="d-flex justify-content-center" id="flex_id_${id_number}"></div>`);

                id_number = id_number+1;
            }

            for(var i = 0; i<product_data.length; i++){


                $(`#flex_id_${Math.ceil((i+1)/5)}`).append(`
                    <div class="shell">
                        <div class="container" style="width: 270px;">
                                    <div class="wsk-cp-product">
                                        <div class="wsk-cp-img">
                                            <img src="admin_area/product_images/${product_data[i].product_img1}" alt="Product" class="img-responsive" />
                                        </div>
                                        <div class="wsk-cp-text" style="padding-top: 96%;">
                                            <div class="category">
                                                <span>${product_data[i].manufacturer_title}</span>
                                            </div>
                                            <div class="title-product">
                                                <h3 style="white-space: normal;">${product_data[i].product_title}</h3>
                                            </div>
                                            <div class="description-prod" style="padding-left: 16px;padding-right: 19px;">
                                                <p>${product_data[i].product_desc}</p>
                                            </div>
                                            <div class="card-footer" style="padding-left: 10px;padding-right: 10px;">
                                                <div class="wcf-left"><span class="price">৳${product_data[i].product_psp_price}</span></div>
                                                <div class="wcf-right" ><a href="details.php?product=${product_data[i].product_id}" class="buy-btn"><i class="fa fa-shopping-cart"></i></a></div>
                                                <div class="wcf-right"><a href="details.php?product=${product_data[i].product_id}" class="buy-btn" style="margin-right: 5px !important;"><i class="fa fa-heart"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                    </div>
                `);

            }
        }

        $(document).on('click', '#search_btn', function () {
            // your function here
            event.preventDefault();

            $("#pagination").empty();
            $("#product_container").empty();

            var value =  $("#search_field").val();

            $.ajax({
                url:"search_products.php",
                method:"POST",
                dataType: 'json',
                data: { search: value},
                success:function(data){


                    load_all_products(data);
                },
                error: function(ts) {
                    console.log(ts);
                    console.log(ts.responseText);
                }
            });

        });
    });
</script>

</body>

</html>

