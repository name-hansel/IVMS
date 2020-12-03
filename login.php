<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("location: ./Coordinator/Coordinator-dashboard/coordinator-dashboard.php");
} elseif (isset($_SESSION['company_id'])) {
    header("location: ./Company/company-dashboard/company-dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login-register.css">
    <title>Login</title>
</head>

<body>
    <header>
        <h1><a href="index.php">Industrial Visit Management System</a></h1>
        <div class="header-right">
            <a href="">Login</a>
        </div>
    </header>

    <main>
        <div class="button-div">
            <img src="./Company/images/logo.png" alt="" width="200px">
            <button><a href="./Home, Login and Signup/company_login.php">Company</a></button>
        </div>
        <div class="button-div">
            <img src="./Company/images/person.png" alt="" width="200px">
            <button><a href="./Home, Login and Signup/coordinator_login.php">Coordinator</a></button>
        </div>
    </main>

    <div class="footer">
        <div class="socials">
            <div class="site twitter">
                <img src="Company/images/twitter-square-brands.svg" alt="" width="15px" />
                <a href="">Twitter</a>
            </div>
            <div class="site facebook">
                <img src="Company/images/facebook-square-brands.svg" alt="" width="15px" />
                <a href="">Facebook</a>
            </div>
            <div class="site instagram">
                <img src="Company/images/instagram-brands.svg" alt="" width="15px" />
                <a href="">Instagram</a>
            </div>
        </div>
        <div class="contact">
            <h4>Email Address: contact@ivms.com</h4>
            <h4>Contact Number: 9876543219</h4>
        </div>
    </div>
</body>

</html>