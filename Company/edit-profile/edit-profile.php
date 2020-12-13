<?php
session_start();
if (!isset($_SESSION['company_id'])) {
    header("location: ../../index.php");
}
$company_id = $_SESSION['company_id'];
$url = "https://industrialvisit-api.herokuapp.com/API/company/getCompanyInfo.php?company_id=$company_id";
$json_data = file_get_contents($url);
$company = json_decode($json_data, true);
$company = $company['data'][0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <script>
        const companyID = <?php echo $company_id ?>
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.0/axios.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="script.js"></script>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="header">
        <h1><a href="../../index.php" class="link">Industrial Visit Management System</a></h1>
        <div class="header-right">
            <h5>Edit Profile</h5>
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
        <h3 class="form-heading">Edit Profile</h3>
        <form name="profile" onSubmit="return formValidation()" method="post">
            <div class="form-element">
                <label for="company" class="form-label">company name</label>
                <input type="text" name="name" class="form-input" required value="<?= $company['name'] ?>" />
                <p class="error" id="name-error">Please enter a valid name.</p>
            </div>

            <div class="form-element">
                <label for="phone_number" class="form-label">company contact number</label>
                <input type="text" name="phone_number" class="form-input" required value="<?= $company['phone_number'] ?>" />
                <p class="error" id="phone_number-error">Please enter a valid phone number.</p>
            </div>

            <div class="form-element">
                <label for="description" class="form-label">company description</label>
                <input type="text" name="description" class="form-input" required value="<?= $company['description'] ?>" />
                <p class="error" id="description-error">Please enter a valid description.</p>
            </div>

            <button type="submit" class="edit-profile-btn">edit profile</button>
            <button type="button" id="change-password" class="edit-profile-btn" onclick="password()">change password</button>
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