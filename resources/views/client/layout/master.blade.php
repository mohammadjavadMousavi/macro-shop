<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فروشگاه اینترنتی مکرو شاپ</title>
   
   	@yield('link')

</head>

<body>

@include('client.layout.header')

@yield('content')

<!---------------------------- footer part ------------------------------>
<footer class="container-fluid p-0 mt-5 ">
    <div class="container ">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 justify-content-center ">
            <!-- logo -->
            <div class="col my-4 d-flex justify-content-center align-items-center text-center flex-column order-sm-5 order-lg-0 ">
                <a href="{{ route('client.index') }}">
                    <img src="/client/media/logo.png " alt="logo " class="w-50 ">
                    <h3 class="mt-2 text-white ">مکرو شاپ</h3>
                </a>
            </div>

              @foreach ($categories as $category)

                    @if ($category->has_child)

            <div class="col my-4 ">
                <h4 class="footer-page-title ">{{ $category->title }}</h4>
                <hr style="background-color: #fff; ">
                <ul class="footer-page-list text-center ">
                     @foreach ($category->child as $SubCategory)
                                        @if ($SubCategory->has_product) 

                    <li class="my-3 ">
                        <a href="{{ route('client.product.index',$SubCategory) }}" class="text-white">{{$SubCategory->title}}</a>
                    </li>
                      @endif
                                   @endforeach

                </ul>
            </div>

               @endif   
            @endforeach

                                    

        </div>
    </div>

    <!-- bottom design part -->
    <div class="design-text-wrapper flex-column-reverse flex-md-row shadow-sm ">
        <p> &copy; 2021 macroshop</p>
        <p class="mb-3 mb-md-0 ">توسعه داده شده با ❤ توسط <a href="https://macro-system.ir" target="_blank" class="team-name-link ">مکروسیستم</a>
        </p>
    </div>
</footer>
	@yield('script')

    <script type="text/javascript">
        


  function addToCart(productId){


    var valCart =$('#input-quantity-' + productId).val();

    $.ajax({
      type: "post",
      url: "/cart/" + productId,
      data: {
        _token: "{{ csrf_token() }}",
        quantity: valCart
      },

      success: function(data){
       
        $('#total-count').text(data.cart.total_count);          

        
      }

    
    })

  }


  function remove(productId) {
    
    $.ajax({
      type: "delete",
      url: "/cart/" + productId,
      data: {
        _token: "{{ csrf_token() }}"
      },

      success: function (data) {
         $('#total-count').text(data.cart.total_count);          
         $('#total-itm').text(data.cart.total_count);          
         $('#total-amt').text(data.cart.total_amount);          
         $('#total-amt1').text(data.cart.total_amount);          
         $('#total-amt2').text(data.cart.total_amount);          
         // $('#total-amount').text(data.cart.total_amount);
         $('#cart-row-' + productId).remove();

      }
    
    })

  }



    function addCounter (productId){
        let count = parseInt($('#quantity-input-'+ productId).val())

        if (count == 1) {
            $("#minus-quantity-btn").prop("disabled",false)
        }
        

        $('#quantity-input-'+ productId).val(count + 1)

        let text = $('.quantity-digit'+productId).text()
        $('.quantity-digit-' + productId).text(count + 1)

        
        var valCart = $('#quantity-input-'+ productId).val();

         $.ajax({

          type: "post",
          url: "/cart/" + productId,
          data: {
            _token: "{{ csrf_token() }}",
            quantity: valCart
          },

          success: function(data){
           
            $('#total-count').text(data.cart.total_count);          
            $('#price-pro-'+productId).text(data.cart[productId]['quantity'] * data.cart[productId]['product']['price']); 
            $('#total-itm').text(data.cart.total_count);          
            $('#total-amt').text(data.cart.total_amount);          
            $('#total-amt1').text(data.cart.total_amount);          
            $('#total-amt2').text(data.cart.total_amount);         

            
          }

        
        })

          
    }


let disCounter = (productId) => {
    let count = parseInt($('#quantity-input-'+productId).val())

    if (count == 1) {
        return $("#minus-quantity-btn").prop("disabled",true)
    }


    $('#quantity-input-'+productId).val(count - 1)

    let text = $('.quantity-digit-'+productId).text()
    $('.quantity-digit-'+productId).text(count - 1)

     
        var valCart = $('#quantity-input-'+ productId).val();

         $.ajax({

          type: "post",
          url: "/cart/" + productId,
          data: {
            _token: "{{ csrf_token() }}",
            quantity: valCart
          },

          success: function(data){
           
            $('#total-count').text(data.cart.total_count);          
            $('#price-pro-'+productId).text(data.cart[productId]['quantity'] * data.cart[productId]['product']['price']); 
            $('#total-itm').text(data.cart.total_count);          
             $('#total-amt').text(data.cart.total_amount);          
             $('#total-amt1').text(data.cart.total_amount);          
             $('#total-amt2').text(data.cart.total_amount);         

            
          }

        
        })


}
  
    </script>

  {{-- <script src="/client/js/counter.js"></script> --}}

</body>

</html>