<!-- 아이디 admin 비밀번호 0000 으로 만들기-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <input type="text" name="userid" placeholder="username">
      </p>
      <p class="field">
        <label for="password">password</label>
        <i class="fa-solid fa-lock"></i>
        <input type="password" name="passwd" placeholder="password">
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
