<html>

<head>
  <meta charset="utf-8" />
  <title>Sign up Page</title>
  <link rel="stylesheet" href="coordinator_signup.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
  <div class="row">
    <div class="header">
      Sign <br />
      Up<br />
      for<br />
      <span>Coordinator</span>
    </div>

    <form action="signup.php?type=coordinator" method="POST">
      <div class="main">
        Email : <br />
        <input type="email" name="email" required /><br /><br />
        password : <br /><input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required /><br /><br />
        phone no. : <br /><input type="text" name="phn" pattern="[789][0-9]{9}" required /><br /><br />
        college : <br /><input type="text" name="college" required /><br /><br />
        <input type="submit" class="button" value="submit" />
      </div>
  </div>
  </form>

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
  if (isset($_GET['msg'])) {
    if ($_GET['msg'] === 'error') {
  ?>
      <script>
        alert("Some error has occured. Please try again.");
      </script>
  <?php
    }
  }
  ?>
</body>

</html>