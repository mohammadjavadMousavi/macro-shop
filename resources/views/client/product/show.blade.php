@extends('client.layout.master')


@section('link')
  <link rel="icon" href="/client/media/logo.png" type="image/png">
  <!-- font awesome -->
  <link rel="stylesheet" href="/client/fontawesome/css/all-fonts.min.css">
  <!-- base styles -->
  <link rel="stylesheet" href="/client/css/base-style.css">
  <!-- bootstrap -->
  <link rel="stylesheet" href="/client/bootstrap-5/css/bootstrap.rtl.min.css">
  <!-- same styls -->
  <link rel="stylesheet" href="/client/css/same-styles.css">
  <!-- main styles -->
  <link rel="stylesheet" href="/client/css/single-page.css">
  <!-- login responsive -->
  <link rel="stylesheet" href="/client/css/responsive-single-page.css">
@endsection






@section('content')
	


  @include('client.layout.errors')
  <!---------------------------- single product header part ------------------------------>
  <div class="single-prodcut-container container">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 justify-content-center">
      <!-- image -->
      <div class="col">
        <div class="single-product-img px-4">
          <img src="{{ str_replace('public','/storage',$product->image) }}" alt="product image" class="img-fluid zoom-element">
        </div>
      </div>
      <!-- information -->
      <div class="col single-product-info px-4">
        <h3>{{ $product->name }}</h3>
        <hr>
        <a href="#user-comments" class="user-comments"><span>{{ count($commentCount) }}</span> دیدگاه کاربران</a>
        <p class="product-property-text mb-2">ویژگی های محصول</p>
        <ul class="product-property-list">
        {{--   <p class="mb-2">جسم: پشم</p>
          <p class="mb-2">رنگ: نقره ای</p>
          <p class="mb-2">مدل: 2021</p> --}}

          {{ $product->description }}
        </ul>
        <hr>
        <p class="user-buyer text-secondary"><span>23</span> نفر این محصول را خریداری کردند</p>
      </div>
      <!-- add basket -->
      <div class="col single-product-basket px-4 mt-4 mt-md-0">
        <div class="basket-box p-3 rounded">
          <p class="product-name">{{ $product->name }}</p>
          <hr>
          <div class="trust-wrapper">
            <div class="trust-item">
              <img src="/client/media/return-product.png" alt="return icon" class="trust-img">
              <p>ضمانت بازگشت کالا تا 14 روز</p>
            </div>
            <div class="trust-item">
              <img src="/client/media/fast-delivery.png" alt="delivery icon" class="trust-img">
              <p>تحویل سریع و آسان</p>
            </div>
            <div class="trust-item">
              <img src="/client/media/payment.png" alt="return icon" class="trust-img">
              <p>100 درصد امنیت پرداخت</p>
            </div>
          </div>
          <hr>
          <div class="product-price">
            <p>قیمت محصول</p>
            <p><b>{{ number_format($product->price) }}</b> تومان</p>
          </div>
          <button type="button" class="add-to-basket-btn btn" onclick="addToCart({{ $product->id }});">افزودن به سبد</button>
          <input type="text" name="quantity" value="1" size="2" id="input-quantity-{{ $product->id }}" class="form-control d-none" />
        </div>
      </div>
    </div>
  </div>

    


  <!---------------------------- products part ------------------------------>
  <div class="products-sec-container container">
    <h2 class="main-title">محصولات مرتبط</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 justify-content-center align-items-center mt-4">

    		

    	@foreach ($otherCat as $category)

    	@php
    		$productthis = $category->products;
    	@endphp
	    		
	    		@foreach ($productthis as $productt)
	    			
			        <div class="col p-0">
				        <section class="product-item m-3 shadow">
				          <div class="product-image overly-info-parent">
				            <img src="{{ str_replace('public','/storage',$productt->image) }}" alt="محصول مرتبط" class="img-fluid">
				            <!-- overly -->
				            <div class="product-overly-info">
				               <button type="button" class="add-cart-btn" onclick="addToCart({{ $productt->id }});"><i class="fa fa-plus"></i>افزودن به سبد</button>
                        <input type="text" name="quantity" value="1" size="2" id="input-quantity-{{ $product->id }}" class="form-control d-none" />
				              <!-- product link -->
				              <a href="{{ route('client.product.show',$productt) }}" class="see-product-link"><i class="fa fa-angle-right"></i> مشاهده محصول </a>
				            </div>
				          </div>
				          <article class="product-info shadow-sm">
				            <!-- product link -->
				            <a href="#" class="product-title-link">
				              <p class="product-name">{{ $productt->name }}</p>
				            </a>
				            <p><span class="product-price">{{ $productt->price }}</span> تومان</p>
				          </article>
				        </section>
			      	</div>  

	    		@endforeach


    	@endforeach



      
    </div>
  </div>



  <!---------------------------- specification part ------------------------------>
  <div class="main-container container">
    <div class="row">
      <div class="col-12 col-md-6 col-lg-8 col-xl-9 mb-5">
        <h2 class="main-title mb-4">مشخصات کالا</h2>
        <ul class="col-6 col-lg-4 col-xl-3 specifications-list mx-auto mx-md-0">
            {{-- <p class="mb-2">جسم: پشم</p>
            <p class="mb-2">رنگ: نقره ای</p>
            <p class="mb-2">مدل: 2021</p> --}}

            {{ $product->description }}
        </ul>
      </div>
      <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-5 basket-add-info-parent">
        <div class="basket-add-info shadow">
          <div class="product-part">
            <!-- image -->
            <div class="basket-img">
              <img src="{{ str_replace('public','/storage',$product->image) }}" alt="product image">
            </div>
            <p>{{ $product->name }}</p>
          </div>
          <hr>
          <div class="garanty-text">
            <i class="fa fa-check"></i>
            <p class="text-secondary">گارانتی اصالت و سلامت فیزیکی کالا</p>
          </div>
          <hr>
          <!-- price -->
          <div class="basket-price">
            <p>قیمت</p>
            <p><strong>{{ $product->price }}</strong> تومان</p>
          </div>
           <button type="button" class="add-to-basket-btn btn" onclick="addToCart({{ $product->id }});">افزودن به سبد</button>
          <input type="text" name="quantity" value="1" size="2" id="input-quantity-{{ $product->id }}" class="form-control d-none" />
        </div>
      </div>
      <!-- comments form -->
      <div class="col-12 col-xl-3 mb-5 order-5 order-xl-0">
        <div class="comment-form">
          <h3 class="main-title comments-part-title">ثبت دیدگاه</h3>
          <hr>
          <form action="{{ route('client.comment.store',$product) }}" method="post">
            @csrf
            <input type="text" placeholder="نام شما..." name="name" class="form-control comment-name-input">
            <textarea name="content" placeholder="دیدگاه شما..." class="form-control comment-text-input"></textarea>
            <button name="sub" type="submit" class="comment-submit-btn btn">ثبت دیدگاه</button>
          </form>
        </div>
      </div>
      <!-- uset comments -->
      <div class="col-12 col-xl-6 mb-5" id="user-comments">
        <h3 class="main-title comments-part-title">دیدگاه کاربران</h3>
        <hr>
        <div class="user-comments-wrapper">

          @foreach ($product->comments()->latest()->get() as $comment)
            @if ($comment->status == 1)
              
            
          <div class="user-comments-item rounded bg-white shadow-sm p-2 mb-3">
              <div class="user-comment-name">
                <i class="fa fa-user"></i>
                <p class="user-comment-name">{{ $comment->name }}</p>
                <span style="margin-right: 300px;">{{ $comment->created_at->diffForHumans() }}</span>
              </div>
              <hr>
              <div>
                <p>{{ $comment->content }}</p>
              </div>
          </div>

            @endif
          @endforeach

         
        </div>
      </div>
    </div>
  </div>

@endsection	


@section('script')
	
  <!-------------------------- SCRIPTS LINK -------------------------->
  <!-- JQUERY -->
  <script src="/client/js/jquery.js "></script>
  <!-- zoom plugin -->
  <script src="/client/zoom-plugin/blowup.js "></script>
  <!-- boostrap -->
  <script src="/client/bootstrap-5/js/bootstrap.bundle.min.js "></script>
  <!-- JS -->
  <script src="/client/js/single-page.js "></script>
@endsection