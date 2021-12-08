<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>افزودن محصول</title>
    <link rel="icon" href="/client/media/logo.png" type="image/png">
    <!-- font awesome -->
    <link rel="stylesheet" href="/client/fontawesome/css/all-fonts.min.css">
    <!-- base styles -->
    <link rel="stylesheet" href="/client/css/base-style.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="/client/bootstrap-5/css/bootstrap.rtl.min.css">
    <!-- same styles -->
    <link rel="stylesheet" href="/client/css/same-styles.css">

    @yield('link')

    <style type="text/css">
            
        .dis-none{
            display: none;
        }

        .display-inline{
            display: inline !important;
        }

    </style>

</head>

<body>
<header>
    <div class="panel-header">
        <h4>افزودن محصول</h4>
        <a href="#" class="sign-out-icon" title="خروج">
            <i class="fa fa-sign-out"></i>
        </a>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <div class="col-2 bg-dark p-0 panel-menu">
            <ul class="panel-menu-list">
                <li class="panel-menu-item">
                    <a href="{{ route('admin.index') }}" class="nav-link">
                        <i class="fa fa-dashboard"></i> داشبورد</a>
                </li>
                <li class="panel-menu-item">
                    <a href="{{ route('admin.user.index') }}" class="nav-link">
                        <i class="fa fa-users"></i> کاربران</a>
                </li>
                 <li class="panel-menu-item">
                    <a href="{{ route('admin.user.create') }}" class="nav-link">
                        <i class="fa fa-users"></i>افزودن مدیر</a>
                </li>

                <li class="panel-menu-item">
                    <a href="{{route('admin.product.index')}}" class="nav-link">
                        <i class="fa fa-shopping-basket"></i> محصولات</a>
                </li>
                    
                <li class="panel-menu-item">
                    <a href="{{ route('admin.product.create') }}" class="nav-link">
                      <i class="fa fa-plus-circle"></i>
                      افزودن محصول</a>
                </li>
                             
                  <li class="panel-menu-item">
                    <a href="{{ route('admin.category.create') }}" class="nav-link">
                      <i class="fa fa-list-alt"></i>
                      افزودن دسته بندی</a>
                  </li>
                <li class="panel-menu-item">
                    <a href="{{ route('admin.role.index') }}" class="nav-link">
                        <i class="fa fa-chart-line"></i>نقش کاربران</a>
                </li>
                <li class="panel-menu-item">
                    <a href="{{ route('admin.role.create') }}" class="nav-link">
                        <i class="fa fa-chart-line"></i>ایجاد نقش جدید</a>
                </li>
                <li class="panel-menu-item">
                    <a href="{{ route('admin.order.index') }}" class="nav-link">
                        <i class="fa fa-cart-arrow-down"></i>
                        سفارشات</a>
                </li>
                <li class="panel-menu-item">
                    <a href="{{ route('admin.comment.index') }}" class="nav-link">
                        <i class="fa fa-comments"></i>
                        نظرات</a>
                </li>
            </ul>
        </div>

        @yield('content')
    

    </div>
</div>

@yield('script')

</body>



    <script src="/client/js/jquery.js"></script>

    <script type="text/javascript">
    
        function searched(){

            // var cat = $('#searched').val();

            // // alert(cat);

            //  $.ajax({
            //   type: "post",
            //   url: "/adminpanel/search/" + cat,
            //   data: {
            //     _token: "",
            //     cat_id: cat
            //   },
            //     success: function(data){
                    
                    var searched = $('#seach');

                    if (searched.hasClass('dis-none')) {

                        searched.removeClass('dis-none');
                    }


                    // var name,price,description;
                    // var cat = $('#cat-search');
                    
                        // $.each(data.products,function(index,value){

                        //         $('#cat-search').text(
                        //         '<tr>'
                        //         +'<td>' + value.id + '</td>'
                        //         +'<td></td>'
                        //         +'<td>' + value.name + '</td>'
                        //         +'<td>' + value.price + ' تومان</td>'
                        //         +'<td></td>'
                        //         +'<td class="text-center"><a href="#" class="btn mx-2 btn-outline-success">ویرایش</a><a href="#" class="btn mx-2 btn-outline-danger">حذف</a></td>'
                        //         +'</tr>'
                        //             );
                        // });

                      

                
                        
                      // name = value.name;
                        // description = value.description;

                        // tag = "<p>" + name + "</p>";

                        // cat.text(tag);
                    // $('#cat-search').text(function(){
                             
                    // });





        }

    </script>


</html>
{{-- 
@foreach(session()->get('products') as $pro)
                        '{{ $pro->name }}'
                        @endforeach --}}