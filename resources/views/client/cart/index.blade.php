@extends('client.layout.master')

@section('link')
	<link rel="icon" href="/client/media/logo.png" type="image/png"/>
    <!-- font awesome -->
    <link rel="stylesheet" href="/client/fontawesome/css/all-fonts.min.css"/>
    <!-- base styles -->
    <link rel="stylesheet" href="/client/css/base-style.css"/>
    <!-- bootstrap -->
    <link rel="stylesheet" href="/client/bootstrap-5/css/bootstrap.rtl.min.css"/>
    <!-- same styles -->
    <link rel="stylesheet" href="/client/css/same-styles.css"/>
    <!-- main styles -->
    <link rel="stylesheet" href="/client/css/shopping-cart.css"/>
@endsection


	@section('content')
				
		<!-- shopping products part -->
		<div class="container">
		    <div class="row">

		        <div class="col-12 shopping-product-col shadow border col-lg-8 col-xl-9">

		        	@include('client.layout.errors')
		            <div class="col-12">

		            	@if ($totalCount <= 0)
		            	<div id="cart-empty" class="col-12">
		                    <!------------------ empty basket message ----------------->

		                    <div class="empty-basket-wrapper text-center p-3 col-12">
		                        <img src="/client/media/empty-basket.png" alt="empty basket icon" class="img-fluid">
		                        <h5>سبد خرید شما خالی است!</h5>
		                    </div>


		                    <!------------------ login user part ----------------->

		                    <div class="login-user-wrapper text-center p-2 p-sm-3 col-12">
		                        <img src="/client/media/login-user.png" alt="login icon" class="img-fluid">
		                        <h5 class="login-text">برای مشاهده سبد خرید ابتدا وارد حساب کاربری خود شوید!</h5>
		                    </div>

		                </div>
		            	@else

		             
		                <!------------------ item ------------------>

		              	@foreach ($items as $item)
		              	<div id="cart-row-{{ $item['product']->id }}" class="shopping-product-item p-3 mb-3 col-12 flex-column flex-sm-row">
		                    <!-- image -->
		                    <div class="shopping-product-img col-9 col-sm-3 mx-auto mb-3">
		                        <img src="{{ str_replace('public','/storage',$item['product']->image) }}" alt="product">
		                    </div>
		                    <!-- product info -->
		                    <div class="shopping-product-info col-12 col-sm-9">
		                        <h4 class="mb-3 text-center text-sm-start">{{ $item['product']->name }}</h4>
		                        <!-- trust -->
		                        <section>
		                            <div class="shopping-trust-item">
		                                <img src="/client/media/return-product.png" alt="return icon"/>
		                                <p>ضمانت بازگشت کالا تا 14 روز</p>
		                            </div>
		                            <div class="shopping-trust-item">
		                                <img src="/client/media/fast-delivery.png" alt="delivery icon"/>
		                                <p>تحویل سریع و آسان</p>
		                            </div>
		                            <div class="shopping-trust-item mt-2">
		                                <img src="/client/media/payment.png" alt="payment icon"/>
		                                <p>100 درصد امنیت پرداخت</p>
		                            </div>
		                            <!-- tools -->
		                            <div class="shopping-tools mt-4 row flex-column align-items-start flex-lg-row align-items-lg-center">
		                                <!-- quantity -->
		                                <div class="shopping-tools-quantity col-3">
		                                    <p>تعداد:
		                                    </p>

		                                    <input id="quantity-input-{{ $item['product']->id }}" class="d-none" type="number" name="number" value="{{ $item['quantity'] }}" min="1">
		                                    <div
		                                            class="quantity-inner ms-4">
		                                        <!-- increase button -->
		                                        <button onclick="addCounter({{ $item['product']->id }});" class="quantity-btn" id="plus-quantity-btn">
		                                            <i class="fa fa-plus"></i>
		                                        </button>
		                                        <p class="mx-2 quantity-digit-{{ $item['product']->id }}">{{ $item['quantity'] }}</p>
		                                        <!-- decrease button -->
		                                        <button onclick="disCounter({{ $item['product']->id }});" class="quantity-btn" id="minus-quantity-btn">
		                                            <i class="fa fa-minus"></i>
		                                        </button>

		                                    </div>
		                                </div>
		                                <div
		                                        class="d-flex col-12 align-items-center mt-3 mt-lg-0 justify-content-between ps-0 justify-content-sm-start col-lg-8">
		                                    <!-- remove button -->
		                                    <div class="col-6">
		                                        <button onclick="remove({{ $item['product']->id }});"
		                                           class="remove-btn btn d-flex align-items-center text-secondary mx-lg-auto">
		                                            <i class="fa fa-trash me-1"></i>
		                                            حذف
		                                        </button>
		                                    </div>
		                                    <!-- price -->
		                                    <h6 class="col-6 text-center d-flex justify-content-center">
		                                        <span class="fw-bold mx-1" id="price-pro-{{ $item['product']->id }}">
		                                            {{ $item['product']->price * $item['quantity'] }}
		                                        </span>
		                                        <p> تومان</p>
		                                    </h6>
		                                </div>
		                            </div>
		                        </section>
		                    </div>
		                </div>
		              	@endforeach

		            	@endif


		            </div>
		        </div>

		        <div class="col-12 col-sm-9 mx-auto col-lg-4 col-xl-3">
		            <div class="total-basket-container p-3 shadow-sm border bg-white rounded">
		                <div class="d-flex justify-content-between text-secondary">
		                    <p>تعداد کالا ها (<span id="total-itm">{{ \App\Models\Cart::totalItem() }}</span>)</p>
		                    <p>
		                        <span id="total-amt">{{ number_format(\App\Models\Cart::totalAmount()) }}</span>
		                        تومان
		                    </p>
		                </div>
		                <hr>
		                <div class="d-flex justify-content-between fw-bold">
		                    <p>جمع سبد خرید</p>
		                    <p>
		                        <span id="total-amt1">{{ number_format(\App\Models\Cart::totalAmount()) }}</span>
		                        تومان
		                    </p>
		                </div>
		                <span class="delivery-text">هزینه‌ی ارسال در ادامه بر اساس آدرس، زمان و نحوه‌ی ارسال انتخابی شما‌ محاسبه و به این مبلغ اضافه خواهد شد</span>
		                <!-- buy button -->

		                <form action="{{ route('client.order.store') }}" method="post">
		            		@csrf
		                <button type="submit" class="buy-btn btn">پرداخت</button>

		            	</form>
		            </div>
		            <!------------ pay button in mobile size ----------->
		            <div class="pay-mobile-container d-sm-none">
		            	<form action="{{ route('client.order.store') }}" method="post">
		            		@csrf

		                <button type="submit" class="pay-btn btn">پرداخت</button>

		            	</form>
		                <div class="pay-price">
		                    <p class="text-secondary price-title">مبلغ قابل پرداخت</p>
		                    <div class="total-price-text">
		                        <b class="me-1" id="total-amt2">{{ number_format(\App\Models\Cart::totalAmount()) }}</b>
		                        <span class="text-secondary">تومان</span>
		                    </div>
		                </div>
		            </div>
		        </div>

		    </div>
		</div>
		<!---------------------------- trust information part ---------------------------->
		<div class="trust-info-container container-fluid px-md-4">
		    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 justify-content-center align-items-center">
		        <div class="trust-info-item col">
		            <img src="/client/media/payment.png" alt="seacure icon" class="trust-info-img">
		            <h3 class="trust-info-title my-3">100 درصد امنیت پرداخت</h3>
		            <p class="text-secondary">تمامی جزعیات حساب شما محفوظ میباشد</p>
		        </div>
		        <div class="trust-info-item col">
		            <img src="/client/media/fast-delivery.png" alt="delivery icon" class="trust-info-img w-25">
		            <h3 class="trust-info-title my-3">تحویل سریع وآسان</h3>
		            <p class="text-secondary">محصولات شما را در سریع ترین زمان ممکن به شما تحویل میدهیم</p>
		        </div>
		        <div class="trust-info-item col">
		            <img src="/client/media/home-pay.png" alt="home pay icon" class="trust-info-img">
		            <h3 class="trust-info-title my-3">امکان پرداخت درب منزل</h3>
		            <p class="text-secondary">اگر به هر دلیلی نمیتوانید به صورت اینترنتی مبلغ را پرداخت کنید ، میتوانید درب منزل
		                مبلغ را بپردازید</p>
		        </div>
		        <div class="trust-info-item col">
		            <img src="/client/media/return-product.png" alt="return icon" class="trust-info-img">
		            <h3 class="trust-info-title my-3">ضمانت بازگشت کالا</h3>
		            <p class="text-secondary">در صورت نارضایتی ،میتوانید تا 14 روز کالا را برگردانید</p>
		        </div>
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
<script src="/client/js/shopping-cart.js"></script>
@endsection	
