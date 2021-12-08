@extends('admin.layout.master')


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
	  <link rel="stylesheet" href="/admin/css/orders-panel.css">
  @endsection


@section('content')
	   <div class="col-9 mx-auto">
        <!-- products table -->
        <div class="container-fluid mt-5">
          <h3 class="my-4">لیست سفارشات</h3>
          <div class="table-responsive table-responsive-md">
            <table class="table table-light table-bordered" id="products-table">
              <thead class="table-info">
                <tr>
                  <th>ردیف</th>
                  <th>تصویر</th>
                  <th>ایمیل</th>
                  <th>تعداد</th>
                  <th>مجموع خرید</th>
                  <th>تاریخ</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($orders as $order)
                  
                @php
                  $orderDetail = $order->details;
                @endphp
                 
                 @foreach ($orderDetail as $detail)
                  <tr>
                  <td>{{ $order->id }}</td>
                  <td>
                    <img src="{{ str_replace('public','/storage',$detail->product->image) }}" alt="product" class='table-image'>
                  </td>
                  <td>{{ $order->user->email }}</td>
                  <td>{{ $detail->count }}</td>
                  <td><span>{{ $detail->total_amount }}</span> تومان</td>
                  <td class="text-center">{{ $detail->order->created_at->format('Y-m-d') }}</td>
                  </tr>
                 @endforeach

                @endforeach

              </tbody>
            </table>
          </div>
        </div>

      </div>
@endsection