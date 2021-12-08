<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>کد تایید</title>
  <link rel="icon" href="/client/media/logo.png" type="image/png">
  <!-- font awesome -->
  <link rel="stylesheet" href="/client/fontawesome/css/all-fonts.min.css">
  <!-- base styles -->
  <link rel="stylesheet" href="/client/css/base-style.css">
  <!-- bootstrap -->
  <link rel="stylesheet" href="/client/bootstrap-5/css/bootstrap.rtl.min.css">
  <!-- same styls -->
  <link rel="stylesheet" href="/client/css/same-styles.css">
  <!-- main styles -->
  <link rel="stylesheet" href="/client/css/forgot-password.css">
  <!-- forgot password responsive -->
  <link rel="stylesheet" href="/client/css/forgot-password-responsive.css">
</head>

<body>
  <!-- outer shape poligans -->
  <div class="outer-shape"></div>

  @include('client.layout.header')

  <div class="form-container mt-5">

  	@include('client.layout.errors')

    <div class="form-wrapper">
      <!-- avatar -->
      <div class="form-avatar mb-4">
        <img src="/client/media/reset-password.png" alt="reset password">
      </div>
      <h3>تایید حساب</h3>
      <p class="text-secondary text-center">کد تایید ارسال شده به ایمیلتان را وارد کنید.</p>
      <form action="{{ route('client.register.verifyOtp',$user) }}" method="post" class="main-form mt-5">

      	@csrf
        <!-- alert message -->
        <div class="alert-message"></div>

        <!-- input group -->
        <div class="form-input-group">
          <img src="/client/media/email-icon.png" alt="user icon" class="input-icon">
          <input name="verifyCode" type="text" placeholder="کد تایید" class="form-input" id="" maxlength="30">
          <div class="validation-icons">
            <i class="fa fa-check valid-icon"></i>
            <i class="fa fa-close invalid-icon"></i>
          </div>
        </div>
        <button name="sub" type="submit" class="submit-btn btn">تایید حساب کاربری</button>
      </form>
    </div>
  </div>
  <!-------------------------- SCRIPTS LINK -------------------------->
  <!-- JQUERY -->
  <script src="/client/js/jquery.js"></script>
  <!-- boostrap -->
  <script src="/client/bootstrap-5/js/bootstrap.bundle.min.js"></script>
  <!-- JS -->
  <script src="/client/js/forgot-password.js"></script>
</body>

</html>