<?php
session_start();
if (!isset($_SESSION['company_id'])) {
    header("location: ../../index.php");
}
$company_id = $_SESSION['company_id'];
$url = "https://industrialvisit-api.herokuapp.com/API/company/getHashCompanyID.php?company_id=$company_id";
$json_data = file_get_contents($url);
$company = json_decode($json_data, true);
$company = $company['data'][0]['password'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="http://www.myersdaily.org/joseph/javascript/md5.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.0/axios.min.js"></script>
    <script>
        const companyID = "<?php echo $company_id ?>";
        const currentPassword = "<?php echo $company ?>";
    </script>
    <script src="script.js"></script>
</head>

<body>
    <div class="header">
        <h1><a href="../../index.php" class="link">Industrial Visit Management System</a></h1>
        <div class="header-right">
            <h5>Add New Tour</h5>
        </div>
    </div>

    <div class="sidebar">
        <img src="../images/logo.png" alt="" width="180" />
        <div class="sidebar-links">
            <a href="../company-dashboard/company-dashboard.php">Dashboard</a>
            <a href="">Add New Tour</a>
            <a href="../your-tours/your-tours.php">View Your Tours</a>
            <a href="../scheduled-tours/scheduled-tours.php">View Scheduled Tours</a>
            <a href="../past-tours/past-tours.php">View Past Tours</a>
        </div>
    </div>

    <main class="content">
        <h3 class="form-heading">Change password</h3>
        <form name="password" onSubmit="return formValidation()" method="post" action="change.php">
            <div class="form-element">
                <label for="current" class="form-label">enter current password</label>
                <input type="password" name="current" class="form-input" required />
                <p class="error" id="current-error">Wrong password</p>
            </div>
            <div class="form-element">
                <label for="new" class="form-label">enter new password</label>
                <input type="password" name="new" class="form-input" required />
                <p class="error" id="new-error">Enter a password with at least one capital letter, a number, and 6 or more characters.</p>
                <p class="error" id="same-error">New password same as current password.</p>
            </div>
            <div class="form-element">
                <label for="confirm" class="form-label">confirm password</label>
                <input type="password" name="confirm" class="form-input" required />
                <p class="error" id="confirm-error">Passwords do not match</p>
            </div>
            <button type="submit" class="change-password">change password</button>
            <button type="button" class="change-password back" onclick="goBack()">back</button>
        </form>
    </main>


    <div class="footer">
        <div class="socials">
            <div class="site twitter">
                <img src="../images/twitter-square-brands.svg" alt="" width="15px" />
                <a href="">Twitter</a>
            </div>
            <div class="site facebook">
                <img src="../images/facebook-square-brands.svg" alt="" width="15px" />
                <a href="">Facebook</a>
            </div>
            <div class="site instagram">
                <img src="../images/instagram-brands.svg" alt="" width="15px" />
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