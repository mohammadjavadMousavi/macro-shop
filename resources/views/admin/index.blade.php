@extends('admin.layout.master')


@section('link')
   <!-- main styles -->
  <link rel="stylesheet" href="/admin/css/main.css">
@endsection


@section('content')
     <div class="col-9 container">
        <div class="info-box-wrapper row mt-5">
          <!-- box -->
          <div class="col-12 col-sm-6 col-lg-3 box-info-col px-2">
            <section class="info-box shadow-sm">
              <div class="info-box-icon">
                <i class="fa fa-users"></i>
              </div>
              <article class="info-box-inner">
                <h5>کاربران سایت</h5>
                  <h3>1205</h3>
              </article>
            </section>
          </div>
          <!-- box -->
          <div class="col-12 col-sm-6 col-lg-3 box-info-col px-1">
            <section class="info-box shadow-sm">
              <div class="info-box-icon">
                <i class="fa fa-shopping-basket"></i>
              </div>
              <article class="info-box-inner">
                <h5>محصولات سایت</h5>
                  <h3>423</h3>
              </article>
            </section>
          </div>
          <!-- box -->
          <div class="col-12 col-sm-6 col-lg-3 box-info-col px-1">
            <section class="info-box shadow-sm">
              <div class="info-box-icon">
                <i class="fa fa-cart-arrow-down"></i>
              </div>
              <article class="info-box-inner">
                <h5>فروش</h5>
                  <h3>845</h3>
              </article>
            </section>
          </div>
          <!-- box -->
          <div class="col-12 col-sm-6 col-lg-3 box-info-col px-1">
            <section class="info-box shadow-sm">
              <div class="info-box-icon">
                <i class="fa fa-users"></i>
              </div>
              <article class="info-box-inner">
                <h5>کاربران سایت</h5>
                  <h3>23</h3>
              </article>
            </section>
          </div>
        </div>
        <!-- text -->
        <p class="text-secondary mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
          ea
          commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
@endsection


@section('script')
  
  <script src="/client/js/jquery.js"></script>
  <!-- boostrap -->
  <script src="/client/bootstrap-5/js/bootstrap.bundle.min.js"></script>

  

@endsection


