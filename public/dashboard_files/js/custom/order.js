$(document).ready(function () {

    $('.add-product-btn').on('click', function(e){
        e.preventDefault();
        var name = $(this).data('name');
        var id = $(this).data('id');
        var price = $.number($(this).data('price'), 2);

        $(this).removeClass('btn-info').addClass('btn-success disabled');
        $(this).children().removeClass('fa-plus').addClass('fa-check');

        var html   =  
                    `<tr>
                        <td>${name}</td>
                        <td><input type ="number" data-price = "${price}" name="products[${id}][quantities]" class="form-control input-sm product-quantity" min="1" value="1"></td>
                        <td class="product-price" >${price}</td>
                        <td><button class="btn btn-danger btn-sm remove-product-btn" data-id="${id}" ><i class="fa fa-trash"></i></button></td>
                    </tr>`;
                    
        $('.order-list').append(html);
        
        //to calculate total price
        total() 

    }); //end of append 

    $('body').on('click','.remove-product-btn', function(e){
        e.preventDefault();

        var id = $(this).data('id');

        $(this).closest('tr').remove();
        $('#product-' + id).removeClass('btn-success disabled').addClass('btn-info');
        $('#product-' + id).children().removeClass('fa-check').addClass('fa-plus');

          //to calculate total price
        total() 

    }); //end of remove product btn

    function total()
    {
        var price = 0;

        $('.order-list .product-price').each(function(index){

            price += parseFloat( $(this).html() . replace(/,/g, ''));
        });

        $('.total-price').html($.number(price, 2));
         // check if price > 0

        if( price > 0 ){

            $('#add-order-form-btn').slideDown(500 , function(){
                $(this).css('display','inline');
            });
            
        } else {
            
            $('#add-order-form-btn').slideUp(500 , function(){
                $(this).css('display','none');
            });
        }

    } //end of calculate total

    $('body').on('keyup change','.product-quantity', function(){

        var quantity  = parseInt($(this).val());
        var unitPrice = parseFloat( $(this).data('price') . replace(/,/g, ''));
        $(this).closest('tr').find('.product-price').html($.number(quantity * unitPrice, 2));

        total();

    });//end of product quantity change

    //list all products
   $('.order-products').on('click', function(e){

    e.preventDefault();
    
    $('#loading').css('display', 'flex');

    var url = $(this).data('url');
    var method = $(this).data('method');
    $.ajax({
        url:url,
        method:method,
        success: function(data){
            $('#loading').css('display', 'none');
            $('#order-product-list').html(data);
        }

    });

   });

   //print order

   $(document).on('click', '.print-btn' , function(){

       $('#print-area').printThis();
   });


});//end of document ready
