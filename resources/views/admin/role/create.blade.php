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
          <div class="select-box-container row justify-content-between align-items-start" id="category-row">
            <div class="col-8">
              <h3 class="mb-5">افزودن نقش</h3>
              <form action="{{ route('admin.role.store') }}" method="post">

                @csrf

                <div class="mb-3">
                  <input name="title" type="text" placeholder="نقش" class="form-control">
                </div>

		        			<h3>انتخاب دسترسی </h3>

               				@foreach ($permissions as $permission)
		        				<label class="m-3">
		        					<input style="position: static; opacity: 1; margin-left: 3px;" type="checkbox" name="permissions[]" value="{{ $permission->id }}">{{ $permission->label }}

		        				</label>
		        			@endforeach
              

                <button name="sub1" type="submit" class="btn btn-success d-block mt-4 mx-auto w-100">ثبت نقش</button>
              </form>
            </div>

            
          </div>
        </div>
      </div>
@endsection