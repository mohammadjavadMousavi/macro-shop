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
    <link rel="stylesheet" href="/admin/css/comments-panel.css">

    <style type="text/css">
		.comment-text{
			width: 100px;

		}   

		.comment-text p{
			overflow: hidden;
			text-overflow: ellipsis;
			white-space: nowrap;

		} 	

    </style>
@endsection

       @section('content')
       	 <div class="col-9 mx-auto">
            <!-- products table -->
            <div class="container-fluid mt-5">
                <h3 class="my-4">لیست نظرات</h3>
                <div class="table-responsive table-responsive-md">
                    <table class="table table-light table-bordered" id="products-table">
                        <thead class="table-info">
                        <tr>
                            <th>ردیف</th>
                            <th>تصویر</th>
                            <th>متن کامنت</th>
                            <th>ایمیل</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>

                      		@foreach ($comments as $comment)
                      		<tr>
	                            <td>{{ $comment->id }}</td>
	                            <td>
	                                <img src="{{ str_replace('public','/storage',$comment->product->image) }}" alt="product" class='table-image'>
	                            </td>
	                            <td class="comment-col">
	                                <div class="comment-text">
	                                    <p>{{ $comment->content }}</p>
	                                </div>
	                                <button class="btn btn-sm btn-outline-primary mt-3 open-modal-btn">مشاهده بیشتر</button>
	                                <!-- modal box -->
	                                <div class="modal-container">
	                                    <div class="modal-content">
	                                        <div class="modal-header p-1 bg-light px-3 flex-row-reverse">
	                                            <h5 class="modal-title">متن کامنت</h5>
	                                            <button class="btn close-modal-btn">
	                                                <i class="fa fa-close"></i>
	                                            </button>
	                                        </div>
	                                        <div class="modal-body">
	                                            <p>{{ $comment->content }}</p>
	                                        </div>
	                                    </div>
	                                </div>
	                            </td>
	                            <td>{{ $comment->user->email }}</td>
	                            <td class="text-center">
	                                 
	                            	@if ($comment->status == 1)
		                            	<form class="display-inline" action="{{ route('admin.comment.destroy',$comment) }}" method="post">

		                    				@csrf
					                    	@method('DELETE')
					                    	<input type="submit" name="delete" class="btn mx-2 btn-outline-danger display-inline" value="حذف">
					                    </form>
	                            	@else

	                            	 <form class="display-inline" action="{{ route('admin.comment.destroy',$comment) }}" method="post">

	                    				@csrf
				                    	@method('DELETE')
				                    	<input type="submit" name="delete" class="btn mx-2 btn-outline-danger display-inline" value="حذف">
				                    </form>

				                      <form class="display-inline" action="{{ route('admin.comment.update',$comment) }}" method="post">

	                    				@csrf
				                    	@method('PATCH')
				                    	<input type="submit" name="update" class="btn mx-2 btn-outline-success display-inline" value="تایید">
				                    </form>
	                            		
	                            	@endif
	                                
	                                
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
       	
        <script src="/client/bootstrap-5/js/bootstrap.bundle.min.js"></script>
        <script src="/admin/js/comments-panel.js"></script>

       @endsection
