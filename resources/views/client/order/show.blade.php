<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>وضعیت پرداخت</title>
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

  @include('client.layout.header')

    <div class="container">
          @if ($order->payment_status == 'OK')
            <div style="margin: 0 auto; text-align: center; padding: 30px; width:400px; height: 100px;" class="w-50 h- 50 bg-success text-white">پرداخت با موفقیت انجام شد</div>
          @else
            <div style="margin: 0 auto; text-align: center; padding: 30px; width:400px; height: 100px;" class="w-50 h- 50 bg-danger text-white">پرداخت ناموفق بود</div>

          @endif
    </div>


</body>
</html>