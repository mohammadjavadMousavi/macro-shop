<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ثبت نام در مکرو شاپ</title>
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
  <link rel="stylesheet" href="/client/css/register.css">
  <!-- login responsive -->
  <link rel="stylesheet" href="/client/css/register-responsive.css">
</head>

<body>
  <!-- outer shape poligans -->
  <div class="outer-shape"></div>

  @include('client.layout.header')

  <div class="form-container mt-4 mt-sm-3">
    <div class="form-wrapper">
      <!-- avatar -->
      <div class="form-avatar">
        <img src="/client/media/user-avatar.png" alt="Avatar">
      </div>
      <form action="{{ route('client.register.sendMail') }}" method="post" class="main-form mt-5">

        @csrf

        <!-- alert message -->
        <div class="alert-message"></div>

        <!-- input group -->
        <div class="form-input-group">
          <img src="/client/media/user-icon.png" alt="user icon" class="input-icon">
          <input name="name" type="text" placeholder="نام و نام خانوادگی" class="form-input" id="name-input" maxlength="30" autocomplete="off">
          <div class="validation-icons">
            <i class="fa fa-check valid-icon"></i>
            <i class="fa fa-close invalid-icon"></i>
          </div>
        </div>

        <!-- input group -->
        <div class="form-input-group">
          <img src="/client/media/email-icon.png" alt="user icon" class="input-icon">
          <input name="email" type="text" placeholder="ایمیل" class="form-input" id="username-input" maxlength="30" autocomplete="off">
          <div class="validation-icons">
            <i class="fa fa-check valid-icon"></i>
            <i class="fa fa-close invalid-icon"></i>
          </div>
        </div>

        <!-- input group -->
        <div class="form-input-group">
          <img src="/client/media/key-icon.png" alt="key icon" class="input-icon">
          <input name="password" type="password" placeholder="رمز عبور" class="form-input" id="password-input" maxlength="20" autocomplete="off">
          <div class="validation-icons">
            <i class="fa fa-check valid-icon"></i>
            <i class="fa fa-close invalid-icon"></i>
          </div>
        </div>

        <!-- input group -->
        <div class="form-input-group">
          <img src="/client/media/key-icon.png" alt="key icon" class="input-icon">
          <input type="password" placeholder="تکرار رمز عبور" class="form-input" id="repeat-password-input" maxlength="20" autocomplete="off">
          <div class="validation-icons">
            <i class="fa fa-check valid-icon"></i>
            <i class="fa fa-close invalid-icon"></i>
          </div>
        </div>

        <button name="sub" type="submit" class="submit-btn btn">ثبت نام</button>
        <a href="{{ route('client.indexLogin') }}" class="forgot-pass-link">حساب کابری دارید؟</a>
      </form>
    </div>
  </div>
  <!-------------------------- SCRIPTS LINK -------------------------->
  <!-- JQUERY -->
  <script src="/client/js/jquery.js"></script>
  <!-- boostrap -->
  <script src="/client/bootstrap-5/js/bootstrap.bundle.min.js"></script>
  <!-- JS -->
  <script src="/client/js/register.js"></script>
</body>

</html>