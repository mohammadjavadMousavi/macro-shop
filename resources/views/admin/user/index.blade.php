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
  <link rel="stylesheet" href="/admin/css/users-panel.css">
 @endsection

  
  @section('content')
  
  	  <div class="col-9 mx-auto">
        <!-- search box -->
        <form action="#" class="user-search-form">
          <div class="user-search-group">
            <input type="text" name="search-input" placeholder="جستجو..." class="user-search-input" autocomplete="off">
            <button type="submit" class="user-search-btn"><i class="fa fa-search"></i></button>
          </div>
        </form>
        <!-- products table -->
        <div class="container-fluid mt-5">
          <h3 class="my-4">لیست کاربران سایت</h3>
          <div class="table-responsive table-responsive-md">
            <table class="table table-light table-bordered" id="users-table">
              <thead class="table-info">
                <tr>
                  <th>ردیف</th>
                  <th colspan="2">نام و نام خانوادگی</th>
                  <th>ایمیل</th>
                  <th>وضعیت</th>
                  <th>عملیات</th>
                </tr>
              </thead>

              <tbody>
               
               @foreach ($users as $user)
               	<tr>
                  <td>{{ $user->id }}</td>
                  <td colspan="2">{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>
                  	@if ($user->statusVerify == 1)
                  		<span class="text-success">تایید شده</span>
                  	@else
                  		<span class="text-danger">تایید نشده</span>	
                  	@endif
                  </td>
                  <td class="text-center">
                    {{-- <a href="#" class="btn btn-outline-danger"></a> --}}

                     <form class="display-inline" action="{{ route('admin.user.destroy',$user) }}" method="post">

	                    	@csrf
	                    	@method('DELETE')
	                    	<input type="submit" name="delete" class="btn mx-2 btn-outline-danger display-inline" value="حذف کاربر">
	                    </form>
                  </td>
                </tr>
               @endforeach

              </tbody>
            </table>
          </div>
        </div>

      </div>

  @endsection



@section('script')
  <!-------------------------- SCRIPTS LINK -------------------------->

  <script src="/client/bootstrap-5/js/bootstrap.bundle.min.js"></script>
	  	
@endsection
