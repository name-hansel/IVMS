<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("location: ../../index.php");
}
$url = "https://industrialvisit-api.herokuapp.com/API/tour/getAvailableTours.php";
$json_data = file_get_contents($url);
$tour_array = json_decode($json_data, true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Available Tours</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="header">
        <h1><a href="../../index.php" class="link">Industrial Visit Management System</a></h1>
        <div class="header-right">
            <h5>Available Tours</h5>
        </div>
    </div>

    <div class="sidebar">
        <img src="../../Company/images/person.png" alt="" width="180" />
        <div class="sidebar-links">
            <a href="../Coordinator-dashboard/coordinator-dashboard.php">Dashboard</a>
            <a href="../View-tours/view-tours.php" id="active">View All Tours</a>
            <a href="../Scheduled-tours/scheduled-tours.php">View Scheduled Tours</a>
            <a href="../Past-tours/past-tours.php">View Past Tours</a>
        </div>
    </div>

    <div class="content">
        <!-- header and profile -->
        <div class="content-header">
            <h2 id="main-heading">Available Tours</h2>
            <div class="content-header-icons">
                <a href="../logout.php"><img src="../images/logout.svg" alt="" width="32" /></a>
            </div>
        </div>

        <!-- tours -->
        <div class="available-tours">
            <div class="available-tours-container">
                <?php
                if (isset($tour_array['message'])) {
                ?>
                    <div class='no-tour'>
                        <h3 class='message'>No tours.</h3>
                    </div>
                    <?php
                } else {
                    foreach ($tour_array['data'] as $key => $item) {
                    ?>
                        <div class="tour-div">
                            <div class="tour-card">
                                <h3 id="tour-name"><?= $item['name'] ?></h3>
                                <h4 id="tour-branch"><?= $item['branch'] ?></h4>
                                <h4 id="tour-place"><?= $item['place'] ?></h4>
                                <h5 id="tour-rate"><i class="fa fa-inr" aria-hidden="true"></i><?= $item['rate'] ?></h5>
                            </div>
                            <form action="../Coordinator-dashboard/select_tour.php" method="POST">
                                <input name="select_id" type="hidden" value="<?= $item['tour_id'] ?>">
                                <button class="select-button">Book tour</button>
                            </form>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>

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