<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Login</title>
    <link rel="stylesheet" href="style.css">
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

    <main class="login">
        <h1 class="login-title">Company Login</h1>
        <div class="content">
            <form name="login" action="login.php?type=company" method="POST" onsubmit="return formValidation()">
                <!-- Email -->
                <div class="form-element">
                    <label for="email" class="form-label">email</label>
                    <input type="email" name="email" id="" class="form-input" placeholder="email" required>
                </div>
                <!-- Password -->
                <div class="form-element">
                    <label for="password" class="form-label">password</label>
                    <div class="password-div">
                        <input type="password" name="password" class="form-input" id="password" placeholder="password" required>
                        <i class="fa fa-eye" id="togglePassword"></i>
                    </div>
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
                <input type="submit" class="login-btn" value="login" />
                <p class="form-label"><a href="./company_signup.php">Don't have an account? Signup.</a></p>
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