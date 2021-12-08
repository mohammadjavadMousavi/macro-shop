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
    <link rel="stylesheet" href="/client/css/men-clothe.css">
    <!-- login responsive -->
    <link rel="stylesheet" href="/client/css/responsive-men-clothe.css">
@endsection

@section('content')
    
<!---------------------------- products part ------------------------------>
<div class="products-sec-container container">
    <h2 class="main-title">{{ $category->title }}</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 justify-content-center align-items-center mt-4">

        @php
            $products = $category->products;
        @endphp

        @foreach ($products as $product)

        <div class="col p-0">
            <section class="product-item m-3 shadow">
                <div class="product-image overly-info-parent">
                    <img src="{{ str_replace('public','/storage' , $product->image) }}" alt="new product" class="img-fluid">
                    <!-- overly -->
                    <div class="product-overly-info">
                        {{-- <a href="#" onclick="addToCart({{ $product->id }});" class="add-cart-btn"><i class="fa fa-plus"></i> افزودن به سبد خرید</a> --}}

                        <button type="button" class="add-cart-btn" onclick="addToCart({{ $product->id }});"><i class="fa fa-plus"></i>افزودن به سبد</button>
                        <input type="text" name="quantity" value="1" size="2" id="input-quantity-{{ $product->id }}" class="form-control d-none" />

                        <!-- product link -->
                        <a href="{{ route('client.product.show',$product) }}" class="see-product-link"><i class="fa fa-angle-right"></i> مشاهده محصول </a>
                    </div>
                </div>
                <article class="product-info shadow-sm">
                    <!-- product link -->
                    <a href="#" class="product-title-link">
                        <p class="product-name">{{ $product->name }}</p>
                    </a>
                    <p><span class="product-price">{{ number_format($product->price) }}</span> تومان</p>
                </article>

            </section>
        </div>
        
            
        @endforeach

    </div>
</div>

@php

    $parent = $category->parent;

    // $produc = $parent->products;


@endphp
<div class="products-sec-container container">
    <h2 class="main-title">محصولات دیگر در  دسته ی {{ $parent->title }}</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 justify-content-center align-items-center mt-4">

        @foreach ($otherCat as $other)
            @php
                $pro = $other->products;
            @endphp
            
                @foreach ($pro as $product)

                      <div class="col p-0">
                        <section class="product-item m-3 shadow">
                            <div class="product-image overly-info-parent">
                                <img src="{{ str_replace('public','/storage',$product->image) }}" alt="new product" class="img-fluid">
                                <!-- overly -->
                                <div class="product-overly-info">
                                     <button type="button" class="add-cart-btn" onclick="addToCart({{ $product->id }});"><i class="fa fa-plus"></i>افزودن به سبد</button>
                                     <input type="text" name="quantity" value="1" size="2" id="input-quantity-{{ $product->id }}" class="form-control d-none" />
                                    <!-- product link -->
                                    <a href="{{ route('client.product.show',$product) }}" class="see-product-link"><i class="fa fa-angle-right"></i> مشاهده محصول </a>
                                </div>
                            </div>
                            <article class="product-info shadow-sm">
                                <!-- product link -->
                                <a href="#" class="product-title-link">
                                    <p class="product-name">{{ $product->name }}</p>
                                </a>
                                <p><span class="product-price">{{ number_format($product->price) }}</span> تومان</p>
                            </article>

                        </section>
        </div>
                    
                @endforeach

        @endforeach

       
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

        @foreach ($NewProducts as $product)
            
            <div class="col p-0">
                <section class="product-item m-3 shadow">
                    <div class="product-image overly-info-parent">
                        <img src="{{ str_replace('public','/storage',$product->image) }}"
                             alt="new product" class="img-fluid">
                        <!-- overly -->
                        <div class="product-overly-info">
                             <button type="button" class="add-cart-btn" onclick="addToCart({{ $product->id }});"><i class="fa fa-plus"></i>افزودن به سبد</button>
                            <input type="text" name="quantity" value="1" size="2" id="input-quantity-{{ $product->id }}" class="form-control d-none" />
                            <!-- product link -->
                            <a href="{{ route('client.product.show',$product) }}" class="see-product-link"><i class="fa fa-angle-right"></i> مشاهده محصول </a>
                        </div>
                    </div>
                    <article class="product-info shadow-sm">
                        <!-- product link -->
                        <a href="#" class="product-title-link">
                            <p class="product-name">{{ $product->name }}</p>
                        </a>
                        <p><span class="product-price">{{ number_format($product->price) }}</span> تومان</p>
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

</body>

</html>

@endsection

@section('script')
    
<!-------------------------- SCRIPTS LINK -------------------------->
<!-- JQUERY -->
<script src="/client/js/jquery.js"></script>
<!-- boostrap -->
<script src="/client/bootstrap-5/js/bootstrap.bundle.min.js"></script>
<!-- JS -->
<script src="/client/js/men-clothe.js"></script>

@endsection






