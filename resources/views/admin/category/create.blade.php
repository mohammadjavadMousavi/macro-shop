@extends('admin.layout.master')

@section('link')
   <!-- main styles -->
  <link rel="stylesheet" href="/admin/css/add-category-panel.css">

@endsection

@section('content')
  
      <div class="col-9 mx-auto">
        <div class="container">
          <div class="select-box-container row justify-content-between align-items-start" id="category-row">
            <div class="col-5">
              <h3 class="mb-5">افزودن دسته بندی پدر</h3>
              <form action="{{ route('admin.category.store') }}" method="post">

                @csrf

                <div class="mb-3">
                  <input name="title" type="text" placeholder="دسته بندی پدر" class="form-control">
                </div>

                <label for="on-input-parent" class="d-block mb-2">
                  <input type="radio" name="status" id="on-input-parent" checked value="1">
                  فعال
                </label>
                <label for="off-input-parent">
                  <input type="radio" name="status" id="off-input-parent" value="0">
                  غیر فعال
                </label>

                <button name="sub1" type="submit" class="btn btn-success d-block mt-4 mx-auto w-100"> ثبت دسته بندی</button>
              </form>
            </div>

            <div class="col-5">
              <h3 class="mb-5">افزودن دسته بندی فرزند</h3>
              <form action="{{ route('admin.category.storeSub') }}" method="post">
                @csrf

                <div class="mb-3">
                  <input name="title" type="text" placeholder="دسته بندی فرزند" class="form-control">
                </div>

                <label for="on-input-child" class="d-block mb-2">
                  <input type="radio" name="status" id="on-input-child" checked value="1">
                  فعال
                </label>
                <label for="off-input-child">
                  <input type="radio" name="status" id="off-input-child" value="0">
                  غیر فعال
                </label>

                <select name="category_id" class="select-input form-select my-4">

                  @foreach ($categories as $category)

                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                    
                  @endforeach


                </select>
                <button name="sub2" type="submit" class="btn btn-success d-block mt-4 mx-auto w-100"> ثبت دسته بندی</button>
              </form>
            </div>
          </div>
        </div>
      </div>
@endsection