<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>تغییر رمز عبور</title>
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
  <link rel="stylesheet" href="/client/css/set-new-password.css">
  <!-- forgot password responsive -->
  <link rel="stylesheet" href="/client/css/set-new-password-responsive.css">
</head>

<body>
  <!-- outer shape poligans -->
  <div class="outer-shape"></div>

  @include('client.layout.header')

  <div class="form-container mt-5">
    <div class="form-wrapper">
      <!-- avatar -->
      <div class="form-avatar">
        <img src="/client/media/set-password.png" alt="set password">
      </div>
      <h3>تغییر رمز عبور</h3>
      <form action="{{ route('client.login.setPass',$user) }}" method="post" class="main-form mt-5">
      	@csrf
        <!-- alert message -->
        <div class="alert-message"></div>

        <!-- input group -->
        <div class="form-input-group">
          <img src="/client/media/key-icon.png" alt="key icon" class="input-icon">
          <input name="password" type="password" placeholder="رمز عبور جدید" class="form-input" id="password-input" maxlength="20">
          <div class="validation-icons">
            <i class="fa fa-check valid-icon"></i>
            <i class="fa fa-close invalid-icon"></i>
          </div>
        </div>

        <!-- input group -->
        <div class="form-input-group">
          <img src="/client/media/key-icon.png" alt="key icon" class="input-icon">
          <input type="password" placeholder="تکرار رمز عبور جدید" class="form-input" id="repeat-password-input" maxlength="20">
          <div class="validation-icons">
            <i class="fa fa-check valid-icon"></i>
            <i class="fa fa-close invalid-icon"></i>
          </div>
        </div>
        <button name="sub" type="submit" class="submit-btn btn">تغییر رمز عبور</button>
      </form>
    </div>
  </div>
  <!-------------------------- SCRIPTS LINK -------------------------->
  <!-- JQUERY -->
  <script src="/client/js/jquery.js"></script>
  <!-- boostrap -->
  <script src="/client/bootstrap-5/js/bootstrap.bundle.min.js"></script>
  <!-- JS -->
  <script src="/client/js/set-new-password.js"></script>
</body>

</html>