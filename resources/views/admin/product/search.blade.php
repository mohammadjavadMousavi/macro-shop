@extends('admin.layout.master')


@section('link')
  <!-- main styles -->
  <link rel="stylesheet" href="/admin/css/products-panel.css">
@endsection


@section('content')
   
	    <div class="col-9 mx-auto">
	        <!-- search box -->
	        <form method="post" class="user-search-form">
	          <div class="user-search-group">
	            <input type="text" name="search-input" placeholder="جستجو..." class="user-search-input" autocomplete="off">
	            <button name="search-btn" type="submit" class="user-search-btn"><i class="fa fa-search"></i></button>
	          </div>
	        </form>
	      


	        <hr>
	        <div class="container">
	          <div class="select-box-container row justify-content-between">
	            <div class="col-12 col-md-5">
	              <h5 class="mb-2">دسته بندی جزعی</h5>
	            	
	              <form action="{{ route('admin.cat.search') }}" method="post">
	              	@csrf

	              	 <select name="cat" action="{{ route('admin.cat.search') }}" class="select-input form-select" id="searched">
	                <option value="" disabled selected>دسته بندی خود را انتخواب کنید</option>

	                @foreach ($categories as $category)

	                	<option value="{{ $category->id }}">{{ $category->title }}</option>
							                	
	                @endforeach

	               

	              </select>


	               <div class="col-6 mt-4">
                    <button name="sub3" type="submit" class="btn btn-success mt-4 mx-auto d-block">جستجوی محصول مورد نظر
                    <i class="fa fa-check"></i></button>
                  </div>

	              </form>

	            </div>
	          </div>
	        </div>

	        @if (count($products) > 0)
	          <!-- products table -->
	        <div class="container-fluid mt-5" id="seach">
	          <h3 class="my-4">محصولات مرتبط با دسته بندی <span class="text-warning">{{ $bbrr }}</span> پیدا شد</h3>
	          <div class="table-responsive table-responsive-md">
	            <table class="table table-light table-bordered" id="products-table">
	              <thead class="table-info">
	                <tr>
	                  <th>ردیف</th>
	                  <th>تصویر</th>
	                  <th>نام محصول</th>
	                  <th>قیمت</th>
	                  <th>دسته بندی</th>
	                  <th>عملیات</th>
	                </tr>
	              </thead>
	              <tbody id="cat-search">

		              
		              	
		              	@foreach ($products as $pros)
		              		
		                <tr>
		                  <td>{{ $pros->id }}</td>
		                  <td>
		                    <img src="{{ str_replace('public','/storage',$pros->image) }}" alt="prosduct" class='table-image'>
		                  </td>
		                  <td>{{ $pros->name }}</td>
		                  <td>{{ number_format($pros->price) }}  تومان</td>
		                  <td>{{ $pros->category->title }}</td>
		                  <td class="text-center">
		                    <a href="#" class="btn mx-2 btn-outline-success">ویرایش</a>
		                    <form class="display-inline" action="{{ route('admin.product.destroy',$pros) }}" method="post">

	                    	@csrf
	                    	@method('DELETE')
	                    	<input type="submit" name="delete" class="btn mx-2 btn-outline-danger display-inline" value="حذف">
	                    </form>
		                  </td>
		                </tr>

		              	@endforeach
		            	

	              </tbody>
	            </table>
	          </div>
	        </div>

	        @else

              	<tr class="mt-5">
              		<h2>محصولی وجود ندارد</h2>
              	</tr>

		    @endif


	    </div>
@endsection

