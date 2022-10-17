<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

?>

<link href="css/style.css" rel="stylesheet" xmlns="">
<link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
/>

<body style="background: white">

<!--end header-->
<section class="home2" id="home2" style="background: white">

    <?php getProducts_atSlider() ?>

</section>
<!--end home-->
<!--end product-->
<section class="featured2" id="fearured2">
    <h1 class="heading2">New <span>Product</span></h1>
    <?php getProducts_atNewProduct() ?>

</section>

<div class="d-flex justify-content-center">
    <a href='shop.php' style="background: orange;color: white;margin-bottom: 20px;" class='btn2'>See All products</a>
</div>

<!--end product-->
<?php

include("includes/footer.php");

?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="js/script.js"></script>
<script>
    $( document ).ready(function() {
        setInterval(function() {next()},5000);
        if(window.screen.width <= 1546){
            const shoes2 = document.getElementsByClassName("shoe2");
            for(let  i = 0; i< shoes2.length; i++ ){
                shoes2[i].style.transform = "unset";
                shoes2[i].style.width = "415px";
            }

            const shoeName = document.getElementsByTagName("h3");
            for(let  i = 0; i< shoeName.length; i++ ){
                shoeName[i].style.fontSize = "35px";
            }

            const shoeDescription = document.getElementsByTagName("p");
            for(let  i = 0; i< shoeDescription.length; i++ ){
                shoeDescription[i].style.fontSize = "20px";
            }

            const btn2 = document.getElementsByClassName("btn1");
            for(let  i = 0; i< btn2.length; i++ ){
                btn2[i].style.width = "73px";
                btn2[i].style.height = "55px";
                btn2[i].style.paddingLeft = "5px";
                btn2[i].style.paddingRight = "5px";
                btn2[i].style.paddingTop = "8px";
                btn2[i].style.textAlign = "center";
                btn2[i].style.paddingBottom = "10px";
            }

            const heading2 = document.getElementsByClassName("heading2");
            for(let  i = 0; i< heading2.length; i++ ){
                heading2[i].style.fontsize = "42px";

            }

            const row2 = document.getElementsByClassName("row2");
            console.log(row2);
            for(let  i = 0; i< row2.length; i++ ){
               row2[i].style.flexWrap = "unset";

            }

        }


    });
</script>
</body>
</html>

