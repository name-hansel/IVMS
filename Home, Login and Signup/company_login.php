<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Company Login</title>
  <link rel="stylesheet" href="company_login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script>
    function formValidation() {
      let email = document.login.email.value;
      let password = document.login.password.value;
      let result = true;
      if (email.length === 0 || password.length === 0) {
        result = false;
      }
      return result;
    }
  </script>
</head>

<body>
  <!--header-->
  <div class="header">
    <span class="home">
      <a href="../index.php"><i class="fa fa-home fa-3x"></i></a>
    </span>
    <img class="img" src="http://i.xp.io/2Hh2auaj.jpg">
  </div>

  <!--main-->
  <div class="main">
    <div class="form">
      <h1>Company <br>Login </h1>

      <form name="login" action="login.php?type=company" method="POST" onsubmit="return formValidation()">
        <div class="textbox">
          <i class="fa fa-user"></i>
          <input type="email" placeholder="Email" name="email" required><br>
        </div>

        <div class="error">
          <small>Error message</small>
        </div>

        <div class="textbox">
          <b class="fa fa-lock"></b>
          <input type="password" name="password" id="password" placeholder="Enter the password" required>
          <i class="fa fa-eye" id="togglePassword"></i>

          <!-- JS for toggling password-->
          <script>
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');

            togglePassword.addEventListener('click', function(e) {
              // toggle the type attribute
              const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
              password.setAttribute('type', type);
              // toggle the eye slash icon
              this.classList.toggle('fa-eye-slash');
            });
          </script>
        </div>

        <div class="error">
          <small>Error message</small>
        </div>

        <p><button class="btn" type="submit">Sign in</button></p>
    </div>
    </form>
  </div>


  <!--footer-->
  <div class="footer">
    <div class="socials">
      <div class="site twitter">
        <i class="fa fa-twitter-square" aria-hidden="true"></i>
        <a href="">Twitter</a>
      </div>
      <div class="site facebook">
        <i class="fa fa-facebook-official" aria-hidden="true"></i>
        <a href="">Facebook</a>
      </div>
      <div class="site instagram">
        <i class="fa fa-instagram" aria-hidden="true"></i>
        <a href="">Instagram</a>
      </div>
    </div>
    <div class="contact">
      <h4>Email Address: contact@ivms.com</h4>
      <h4>Contact Number: 9876543219</h4>
    </div>
  </div>
  <?php
  if (isset($_GET['error'])) {
    if ($_GET['error'] === 'no_account') {
  ?>
      <script>
        alert("No account found!");
      </script>
    <?php
    } elseif ($_GET['error'] === 'wrong_password') {
    ?>
      <script>
        alert("Wrong password!");
      </script>
    <?php
    }
  }
  if (isset($_GET['msg'])) {
    if ($_GET['msg'] === 'success') {
    ?>
      <script>
        alert("You have successfully registered. Please login.");
      </script>
  <?php
    }
  }
  ?>
</body>

</html>