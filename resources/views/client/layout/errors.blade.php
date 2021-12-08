	@if (count($errors->all()) > 0 )
     	 <ul class="bg-warning p-5" style="list-style-type: none;">	
     		@foreach ($errors->all() as $error)
    			<li class="text-danger">{{ $error }}</li>
 			@endforeach
 	 	</ul>
	@endif