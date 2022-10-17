var path = window. location. pathname;
var page = path. split("/"). pop();

console.log(page);

if(page=='men.php'){
    $("#men").addClass("categories__link--active");
    $("#women").removeClass("categories__link--active");
    $("#shop").removeClass("categories__link--active");
    $("#my_account").removeClass("categories__link--active");

    $("#my_wishlist").removeClass("categories__link--active");
    $("#my_order").removeClass("categories__link--active");
    $("#edit_your_account").removeClass("categories__link--active");
    $("#change_password").removeClass("categories__link--active");
};
if(page=='women.php'){
    $("#men").removeClass("categories__link--active");
    $("#women").addClass("categories__link--active");
    $("#shop").removeClass("categories__link--active");
    $("#my_account").removeClass("categories__link--active");

    $("#my_wishlist").removeClass("categories__link--active");
    $("#my_order").removeClass("categories__link--active");
    $("#edit_your_account").removeClass("categories__link--active");
    $("#change_password").removeClass("categories__link--active");
};


if(page=='shop.php'){
    $("#men").removeClass("categories__link--active");
    $("#women").removeClass("categories__link--active");
    $("#shop").addClass("categories__link--active");
    $("#my_account").removeClass("categories__link--active");

    $("#my_wishlist").removeClass("categories__link--active");
    $("#my_order").removeClass("categories__link--active");
    $("#edit_your_account").removeClass("categories__link--active");
    $("#change_password").removeClass("categories__link--active");
};
$('#my_account').click(function(){
    $("#men").removeClass("categories__link--active");
    $("#women").removeClass("categories__link--active");
    $("#shop").removeClass("categories__link--active");
    $("#my_account").addClass("categories__link--active");

    $("#my_wishlist").removeClass("categories__link--active");
    $("#my_order").removeClass("categories__link--active");
    $("#edit_your_account").removeClass("categories__link--active");
    $("#change_password").removeClass("categories__link--active");
});