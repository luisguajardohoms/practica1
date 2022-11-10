$(document).ready(function(){
    $(' .category_list .category_item[category="all"]').addClass('ct_item_active');

    $('.category_item').click(function(){
        var catProduct = $(this).attr('category');
        console.log(catProduct);
        //alert (catProduct);

        $('.category_item').removeClass('ct_item_active');
        $(this).addClass('ct_item_active');

        $('.product_item').hide();

       $('.product_item[category="'+ catProduct +'"]').show();
       console.log(catProduct);
       
    });

    $('.category_item[category="all"]').click(function(){
        $('.product_item').show();
    });


});