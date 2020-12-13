<?php
session_start();
if (!isset($_SESSION['company_id'])) {
    header("location: ../../index.php");
}
$company_id = $_SESSION['company_id'];
$url = "https://industrialvisit-api.herokuapp.com/API/bookedTour/getCompanyBookedTours.php?company_id=$company_id";
$json_data = file_get_contents($url);
$tourArray = json_decode($json_data, true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Scheduled Tours</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <!-- header -->
    <header class="header">
        <h1><a href="../../index.php" class="link">Industrial Visit Management System</a></h1>
        <div class="header-right">
            <h5>Your Scheduled Tours</h5>
        </div>
    </header>

    <div class="sidebar">
        <img src="../images/logo.png" alt="" width="180" />
        <div class="sidebar-links">
            <a href="../company-dashboard/company-dashboard.php">Dashboard</a>
            <a href="../add-new-tour/add-new-tour.php">Add New Tour</a>
            <a href="../your-tours/your-tours.php">View Your Tours</a>
            <a href="" id="active">View Scheduled Tours</a>
            <a href="../past-tours/past-tours.php">View Past Tours</a>
        </div>
    </div>

    <main class="content">
        <!-- content heading -->
        <header class="content-header">
            <h2 id="main-heading">Your Scheduled Tours</h2>
            <div class="content-header-icons">
                <a href="../edit-profile/edit-profile.php"><img src="../images/user.svg" alt="" width="35" /></a>
                <a href="../logout.php"><img src="../images/logout.svg" alt="" width="32" /></a>
            </div>
        </header>

        <!-- scheduled tours -->
        <div class="tour-container">
            <?php
            if (isset($tourArray['data'][0]['message'])) {
            ?>
                <div class='no-tour'>
                    <h3 class='message'>No scheduled tours.</h3>
                </div>
                <?php
            } else {
                foreach ($tourArray['data'] as $key => $item) {
                ?>
                    <section class="tour-card">
                        <div class="tour-heading">
                            <h2 class="tour-title"><?= $item['name'] ?></h2>
                            <h3 class="tour-college"><?= $item['college'] ?></h3>
                            <h3 class="tour-date"><?= $item['date'] ?></h3>
                        </div>
                        <div class="tour-details">
                            <h3 class="tour-booked">Booked at: <?= substr($item['booked_at'], 0, 10) ?></h3>
                            <h4 class="tour-people">Number of Attendees: <?= $item['number_people'] ?></h4>
                        </div>
                    </section>
            <?php
                }
            }
            ?>
        </div>
    </main>

    <!-- footer -->
    <footer class="footer">
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
    </footer>
</body>

</html>