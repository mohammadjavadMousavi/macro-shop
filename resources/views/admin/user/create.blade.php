@extends('admin.layout.master')

@section('link')
   <!-- main styles -->
  <link rel="stylesheet" href="/admin/css/add-category-panel.css">
<style type="text/css">
	

  #category-row::after{
  	content: none;
  }

</style>

@endsection

@section('content')
  
      <div class="col-9 mx-auto">
        <div class="container">
          @include('client.layout.errors')
          <div class="select-box-container row justify-content-between align-items-start" id="category-row">
            <div class="col-8">
              <h3 class="mb-5">افزودن مدیر جدید</h3>
              <form action="{{ route('admin.user.store') }}" method="post">

                @csrf

                <div class="mb-3">
                  <input name="name" type="text" placeholder="نام" class="form-control" required="">
                </div>
                  <div class="mb-3">
                  <input name="email" type="email" placeholder="ایمیل" class="form-control" required="">
                </div>
                <div class="mb-3">
                  <input name="password" type="password" placeholder="رمز" class="form-control" required="">
                </div>
                 <div class="mb-3">
                  <input name="password_confirmation" type="password" placeholder="تکرار رمز" class="form-control" required="">
                </div>

                 <select name="role_id" class="select-input form-select my-4" required="">

                  <option disabled="" selected="">نقش مدیر را انتخاب کنید</option>

                  @foreach ($roles as $role)

                    <option value="{{ $role->id }}">{{ $role->title }}</option>
                    
                  @endforeach


                </select>


                <button name="sub1" type="submit" class="btn btn-success d-block mt-4 mx-auto w-100">افزودن مدیر</button>
              </form>
            </div>

            
          </div>
        </div>
      </div>
@endsection