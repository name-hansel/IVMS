<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinator Signup</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Industrial Visit Management System</h1>
        <div class="header-right">
            <a href="../index.php">Back to Home</a>
        </div>
    </header>
    <nav>
        <a href="../Information/AvailableTourInfo/AvailableToursInfo.php">Tours</a>
        <a href="../Information/About.html">About Us</a>
        <a href="../Information/CompanyInfo/CompanyInfo.php">Companies</a>
    </nav>

    <main class="sign-up">
        <h1 class="sign-up-title">Coordinator Sign-Up</h1>
        <div class="content">
            <form action="signup.php?type=coordinator" method="POST">
                <div class="form-element">
                    <label for="email" class="form-label">email</label>
                    <input type="email" name="email" id="" class="form-input" pattern=".+@gmail.com" required>
                </div>
                <div class="form-element">
                    <label for="password" class="form-label">password</label>
                    <input type="password" name="password" id="" class="form-input" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                </div>
                <div class="form-element">
                    <label for="phn" class="form-label">phone number</label>
                    <input type="text" name="phn" id="" class="form-input" pattern="[789][0-9]{9}" required>
                </div>
                <div class="form-element">
                    <label for="college" class="form-label">college name</label>
                    <input type="text" name="college" id="" class="form-input" required>
                </div>
                <input type="submit" class="signup-btn" value="submit" />
            </form>
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