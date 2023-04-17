<!-- 아이디 admin 비밀번호 0000 으로 만들기-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="apple-touch-icon" sizes="57x57" href="img/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="img/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="img/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="img/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="img/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="img/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="img/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
  <link rel="manifest" href="img/favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="img/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <title>Admin Login | FASTCODE</title>
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <main>
    <h1 id="main-logo"><a href="/"><img src="img/fastcode_logo_big.png" alt="Fastcode"><span>fastcode</span></a></h1>
    <form action="login_ok.php" method="post">
      <h2 class="content-title">admin</h2>
      <p class="field">
        <label for="username">username</label>
        <i class="fa-solid fa-user"></i>
        <input type="text" id="username" name="userid" placeholder="username">
      </p>
      <p class="field">
        <label for="password">password</label>
        <i class="fa-solid fa-lock"></i>
        <input type="password" id="password" name="passwd" placeholder="password">
      </p>
      <input type="submit" value="LOGIN" class="y-btn login-btn btn-navy">
    </form>
  </main>
  <!-- <div class="login-bg"> -->
    <img src="img/login_wave_bg.png" alt="background" class="bg-bottom">
    <div><i class="fa-solid fa-sailboat"></i></div>
    <img src="img/login_wave_top.png" alt="background" class="bg-top">
  <!-- </div> -->
</body>
</html>
