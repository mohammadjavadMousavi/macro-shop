@extends('admin.layout.master')

@section('link')
	 <!-- main styles -->
    <link rel="stylesheet" href="/admin/css/add-product-panel.css">
    
@endsection


@section('content')
	
 <div class="col-9 mx-auto">
            <div class="container">
                <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">

                	@csrf

                    <div class="select-box-container row justify-content-between align-items-start">
      
                        <div class="col-12 col-md-5">
                            <h5 class="mb-2">دسته بندی جزعی</h5>
                            <select id="cat" name="category_id" class="select-input form-select">
                                <option value="0" selected disabled>زیرشاخه دسته بندی را انتخاب کنید</option>

                                @foreach ($categories as $category)

                                	<option value="{{ $category->id }}">{{ $category->title }}</option>
									                                	
                                @endforeach
                               

                            </select>
                        </div>
                        <hr class="mt-5">
                        <h4>مشخصات محصول</h4>
                        <div class="col-5 mt-4">
                            <div class="mb-4">
                                <input name="name" type="text" placeholder="نام محصول" class="form-control">
                            </div>
                            <div class="input-group mb-4">
                                <input name="price" type="text" placeholder="قیمت محصول" class="form-control">
                                <span class="input-group-text">تومان</span>
                            </div>
                            <hr class="my-4">
                            <div class="product-img-wrapper">

                                <label for="add-product-img" class="d-block mb-4 text-center">
                                    <p class="btn btn-outline-primary">افزودن تصویر <i class="fa fa-plus ms-2"></i></p>
                                </label>
                                <input name="image" type="file" id="add-product-img" class="d-none">

                                <img src="/admin/media/default-img.png" alt="product image"
                                     class="product-img img-thumbnail">
                            </div>
                        </div>

                        <div class="col-6 mt-4">
                            <textarea name="description" class="form-control" placeholder="توضیحات محصول" rows="10"
                                      id="editor1"></textarea>
                            <button name="sub3" type="submit" class="btn btn-success mt-4 mx-auto d-block">افزودن محصول
                                <i class="fa fa-check"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

@endsection

@section('script')
	<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>

	<script type="text/javascript">
	    CKEDITOR.replace('editor1');
	</script>
	<script src="/client/js/jquery.js"></script>

@endsection