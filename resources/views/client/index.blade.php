@extends('client.layout.master')

@section('link')
     <link rel="icon" href="/client/media/logo.png" type="image/png">
    <!-- font awesome -->
    <link rel="stylesheet" href="/client/fontawesome/css/all-fonts.min.css">
    <!-- base styles -->
    <link rel="stylesheet" href="/client/css/base-style.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="/client/bootstrap-5/css/bootstrap.rtl.min.css">
    <!-- same styles -->
    <link rel="stylesheet" href="/client/css/same-styles.css">
    <!-- main styles -->
    <link rel="stylesheet" href="/client/css/main.css">
    <!-- responsive -->
    <link rel="stylesheet" href="/client/css/main-responsive.css">
    <!-- sweetalert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('main-header')
    
  <!-- main header -->
    <div class="main-header flex-column flex-lg-row">
        <div class="main-image-wrapper main-header-item d-none d-sm-block">
            <img src="/client/media/main-header.png" alt="shopper person">
        </div>
        <div class="main-info-wrapper main-header-item">
            <h1 class="header-slogan">آرام و با کلاس باش</h1>
            <p>برای اولین بار مکرو شاپ خرید را برای شما آسان کرد تا آسان تر از همیشه به حس تازگی برسید!</p>
            <p>بهترین و با کیفیت ترین اجناس را از ما بخواهید :)</p>
            <a href="#collection" class="header-go-shop-btn btn">بریم خرید</a>
        </div>
    </div>

@endsection


@section('content')
    

<!---------------------------- collection part ---------------------------->
<div class="collection-container container" id="collection">
    <div class="row">
        <!-- header title list -->
        <div class="col-12 mb-sm-1">
            <ul class="collection-list-header flex-column flex-sm-row">

                @foreach ($categories as $category) 
                    @if ($category->has_child)
                            <li class="collection-header-item active" data-type='{{ $category->id }}'>{{ $category->title }}</li>                                        
                                                
                    @endif
                @endforeach


                </ul>
        </div>
        <hr>
        <!--************************** MEN COLLECTION **************************-->
        <div class="container mt-2 collection-wrapper">

            @foreach ($categories as $category) 
                @if ($category->has_child)

                @php
                    $sub = $category->child;
                @endphp
            
                    <div class="outer-row-collection active-collection-row">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 justify-content-center row-collection"
                             id="{{ $category->id }}">
                            <!-- collection content -->
                            
                            @foreach ($sub as $SubCategory)

                             @if ($SubCategory->has_product)

                                @php
                                    $pro = $SubCategory->products->last();
                                @endphp                                
                                     <div class="col">
                                        <a href="{{ route('client.product.index',$SubCategory) }}" title="">
                                            <div class="collection-image shadow py-4">
                                                <img src="{{ str_replace('public','/storage',$pro->image) }}" alt="men clothe">
                                                <p class="collection-title">{{ $SubCategory->title }}</p>
                                            </div>
                                        </a>
                                    </div>
                            @endif
                                                                
                             @endforeach
                           


                        </div>
                    </div>

                @endif
            @endforeach
        </div>
    </div>
</div>


<!---------------------------- trust information part ---------------------------->
<div class="trust-info-container container-fluid px-md-4">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 justify-content-center align-items-center">
        <div class="trust-info-item col">
            <img src="/client/media/payment.png" alt="payment" class="trust-info-img">
            <h3 class="trust-info-title my-3">100 درصد امنیت پرداخت</h3>
            <p class="text-secondary">تمامی جزعیات حساب شما محفوظ میباشد</p>
        </div>
        <div class="trust-info-item col">
            <img src="/client/media/fast-delivery.png" alt="payment" class="trust-info-img w-25">
            <h3 class="trust-info-title my-3">تحویل سریع وآسان</h3>
            <p class="text-secondary">محصولات شما را در سریع ترین زمان ممکن به شما تحویل میدهیم</p>
        </div>
        <div class="trust-info-item col">
            <img src="/client/media/return-product.png" alt="payment" class="trust-info-img">
            <h3 class="trust-info-title my-3">ضمانت بازگشت کالا</h3>
            <p class="text-secondary">در صورت نارضایتی ،میتوانید تا 14 روز کالا را برگردانید</p>
        </div>
    </div>
</div>

<!---------------------------- newest part ------------------------------>
<div class="products-sec-container container">
    <h2 class="main-title">جدیدترین محصولات</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 justify-content-center align-items-center mt-4">
        
        @foreach ($NewProducts as $products)
            
        <div class="col p-0">
            <section class="product-item m-3 shadow">
                <div class="product-image overly-info-parent">
                    <img src="{{ str_replace('public','/storage',$products->image) }}"
                         alt="new product" class="img-fluid">
                    <!-- overly -->
                    <div class="product-overly-info">
                        <button type="button" class="add-cart-btn" onclick="addToCart({{ $products->id }});"><i class="fa fa-plus"></i>افزودن به سبد</button>
                        <input type="text" name="quantity" value="1" size="2" id="input-quantity-{{ $products->id }}" class="form-control d-none" />
                        <!-- product link -->
                        <a href="{{ route('client.product.show',$products) }}" class="see-product-link"><i class="fa fa-angle-right"></i> مشاهده محصول </a>
                    </div>
                </div>
                <article class="product-info shadow-sm">
                    <!-- product link -->
                    <a href="#" class="product-title-link">
                        <p class="product-name">{{ $products->name }}</p>
                    </a>
                    <p><span class="product-price">{{ number_format($products->price) }}</span> تومان</p>
                </article>
            </section>
        </div>   
        @endforeach


    </div>
</div>

<!---------------------------- best seller part ------------------------------>
<div class="products-sec-container container">
    <h2 class="main-title">پرفروش ترین محصولات</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 justify-content-center align-items-center mt-4">

        @foreach ($TopBuy as $pro)
           
        <div class="col p-0">
            <section class="product-item m-3 shadow">
                <div class="product-image overly-info-parent">
                    <img src="{{ str_replace('public','/storage',$pro->product->image) }}" alt="new product"
                         class="img-fluid">
                    <!-- overly -->
                    <div class="product-overly-info">
                         <button type="button" class="add-cart-btn" onclick="addToCart({{ $pro->product->id }});"><i class="fa fa-plus"></i>افزودن به سبد</button>
                        <input type="text" name="quantity" value="1" size="2" id="input-quantity-{{ $pro->product->id }}" class="form-control d-none" />
                        <!-- product link -->
                        <a href="{{ route('client.product.show',$pro) }}" class="see-product-link"><i class="fa fa-angle-right"></i> مشاهده محصول </a>
                    </div>
                </div>
                <article class="product-info shadow-sm">
                    <!-- product link -->
                    <a href="#" class="product-title-link">
                        <p class="product-name">{{ $pro->product->name }}</p>
                    </a>
                    <p><span class="product-price">{{ number_format($pro->product->price) }}</span> تومان</p>
                </article>
            </section>
        </div>
       
        @endforeach

    </div>
</div>

@endsection

@section('script')
    
<!-------------------------- SCRIPTS LINK -------------------------->
<!-- JQUERY -->
<script src="/client/js/jquery.js"></script>
<!-- boostrap -->
<script src="/client/bootstrap-5/js/bootstrap.bundle.min.js"></script>
<!-- JS -->
<script src="/client/js/main.js"></script>

@endsection