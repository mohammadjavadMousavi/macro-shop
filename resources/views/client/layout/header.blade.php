
<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-5" id="main-nav">
        <div class="container-fluid flex-row-reverse flex-lg-row">
            <!-- logo -->
            <a class="navbar-brand" href="{{ route('client.index') }}" title="خانه">
                <img src="/client/media/logo.png" width="60" alt="logo">
                <span class="d-none d-sm-inline">مکرو شاپ</span>
            </a>
            <!-- toggle button -->
            <button class="navbar-toggler burger-btn" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <div class="navbar-toggler-icon"></div>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-collapse-wrapper flex-column-reverse flex-lg-row ms-lg-5 mt-4 mt-lg-0">
                    <!-- list -->
                    <ul class="navbar-nav mt-4 mt-lg-0 text-sm-center text-md-start">
                        <li class="nav-item my-1 mx-lg-2">
                            <a class="nav-link active" href="{{ route('client.index') }}">خانه</a>
                        </li>

                        @foreach ($categories as $category)



                                @if ($category->has_child)

                                

                        

                            
                                    <li class="nav-item my-1 mx-lg-2 nav-item-under">

                                        <a class="nav-link">{{ $category->title }} <i class="fa fa-caret-down"></i> </a>
                                        <!-- under menu -->

                                            
                                            <ul class="under-menu-list">
                                                @foreach ($category->child as $SubCategory)

                                                    @if ($SubCategory->has_product)
                                                        
                                                        <li class="under-menu-item">
                                                            <a href="{{ route('client.product.index',$SubCategory) }}">{{$SubCategory->title}}</a>
                                                        </li>

                                                    @endif

                                                @endforeach
                                            </ul>

                                        

                                    </li>


                                @endif   

                        @endforeach

                    
                    </ul>

                    <ul class="navbar-icons-list">
                        <li class="navbar-icons-item">
                            <img src="/client/media/seach-icon.png" width="20" alt="search icon" class="search-icon">
                        </li>
                        <li class="navbar-icons-item">
                            <a href="{{ route('client.cart.index') }}" title="سبد خرید">
                                <img src="/client/media/shopping-bag.png" width="20" alt="shopping-btn">         
                                <span class="badge basket-badge-number" id="total-count">
                      {{ \App\Models\Cart::totalItem() }}
                                </span>
                            </a>
                        </li>
                        <li class="navbar-icons-item nav-item-under">
                            <i class="fa fa-user-o"></i>
                            <!-- under menu -->
                            <div class=" under-menu-list">
                                <ul class="under-menu-list-inner">

                                    @auth()
                                         {{-- <li class="under-menu-item">
                                        <a href="{{ route('client.logout') }}"></a>
                                    </li> --}}

                                    <form action="{{ route('client.logout') }}" method="post">
                
                                        @csrf

                                        @method('DELETE')

                                        <input class="btn under-menu-item" type="submit" name="logout" value="خروج از حساب کاربری" class="btn btn-danger btn-sm">

                                    </form>

                                    @else
                             

                                    <li class="under-menu-item">
                                        <a href="{{ route('client.register') }}">ورود / ثبت نام</a>
                                    </li>
                                    @endauth

                                   {{--  <li class="under-menu-item">
                                        <a href="./panel-admin/index.php">پنل کاربری</a>
                                    </li> --}}

                                </ul>
                            </div>
                        </li>
                    </ul>
                    <!-- search box -->
                    <section class="search-box-container">
                        <div class="search-box-outer">
                            <form action="#" method="post" class="search-box-form">
                                <div class="search-box-group">
                                    <input name="search" type="text" class="search-input" placeholder="جستجو کنید...">
                                    <button name="search-btn" type="submit" class="search-btn"><i
                                                class="fa fa-search"></i></button>
                                </div>
                            </form>
                            <button class="close-search-btn"><i class="fa fa-close"></i></button>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </nav>

    @yield('main-header')
  
</header>