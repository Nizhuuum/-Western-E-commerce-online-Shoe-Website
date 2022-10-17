$(document).on('click', '.categories__link', function () {
    // your function here
    event.preventDefault();

   console.log($('selector').index(this));
    // for(var i = 0; i<Math.ceil(total_products/10); i++){
    //
    //     if(i+1 === parseInt(text) ) {
    //         $("#pagination").append(`<a class="my_page_no active">${i + 1}</a>`);
    //     }
    //     else{
    //         $("#pagination").append(`<a class="my_page_no">${i + 1}</a>`);
    //     }
    // }


});