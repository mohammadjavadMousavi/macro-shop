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
        <!-- roles table -->
        <div class="container-fluid mt-5">
          <h3 class="my-4">لیست نقش ها</h3>
          <div class="table-responsive table-responsive-md">
            <table class="table table-light table-bordered" id="users-table">
              <thead class="table-info">
                <tr>
                  <th>ردیف</th>
                  <th colspan="2">نقش</th>
                 
                  <th>عملیات</th>
                </tr>
              </thead>

              <tbody>
               
               @foreach ($roles as $role)
               	<tr>
                  <td>{{ $role->id }}</td>
                  <td colspan="2">{{ $role->title }}</td>
                  <td class="text-center">
                    {{-- <a href="#" class="btn btn-outline-danger"></a> --}}
	                    <a href="{{ route('admin.role.edit',$role) }}" class="btn mx-2 btn-outline-success">ویرایش</a>


                     <form class="display-inline" action="{{ route('admin.role.destroy',$role) }}" method="post">

	                    	@csrf
	                    	@method('DELETE')
	                    	<input type="submit" name="delete" class="btn mx-2 btn-outline-danger display-inline" value="حذف نقش">
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
