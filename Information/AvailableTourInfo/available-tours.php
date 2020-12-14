<?php
session_start();
$url = 'https://industrialvisit-api.herokuapp.com/API/tour/getAvailableTours.php';
$json_data = file_get_contents($url);
$tour_arr = json_decode($json_data, true);
$url = 'https://industrialvisit-api.herokuapp.com/API/bookedTour/getInfoPastTours.php';
$json_data = file_get_contents($url);
$ptour_arr = json_decode($json_data, true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tours</title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header>
        <h1><a href="../../index.php">Industrial Visit Management System</a></h1>
        <div class="header-right">
            <?php
            if (!isset($_SESSION['user_id'])) {
            ?>
                <a href="../../login.php">Login</a>
                <a href="../../register.php">Sign Up</a>
            <?php
            } elseif (isset($_SESSION['user_id'])) {
            ?>
                <a href="../../Coordinator/Coordinator-dashboard/coordinator-dashboard.php">Dashboard</a>
            <?php
            } elseif (isset($_SESSION['company_id'])) {
            ?>
                <a href="../../Company/Company-dashboard/company-dashboard.php">Dashboard</a>
            <?php
            }
            ?>
        </div>
    </header>

    <nav>
        <a href="">Tours</a>
        <a href="../About.html">About Us</a>
        <a href="../CompanyInfo/CompanyInfo.php">Companies</a>
    </nav>

    <main id="tour-main">
        <section class="available-tours">
            <h1>Available Tours</h1>
            <div class="available-tour-div">
                <?php
                if (isset($tour_arr['message'])) {
                ?>
                    <div class='no-tour'>
                        <h3 class='message'>No tours.</h3>
                    </div>
                    <?php
                } else {
                    foreach ($tour_arr['data'] as $key => $item) {
                    ?>
                        <div class="tour-item available-item">
                            <h3 class="tour-name"><?= $item['name'] ?></h3>
                            <p class="tour-description">Branch: <?= $item['branch'] ?></p>
                            <p class="tour-description">Date: <?= $item['available_days'] ?></p>
                            <p class="tour-description">Address: <?= $item['place'] ?></p>
                            <p class="tour-description"><i class="fa fa-inr" aria-hidden="true"></i> <?= $item['rate'] ?></p>
                            <?php
                            if (isset($_SESSION['user_id'])) {
                            ?>
                                <form action="../../Coordinator/coordinator-dashboard/select_tour.php" method="POST">
                                    <input name="select_id" type="hidden" value="<?= $item['tour_id'] ?>">
                                    <button class="select-button">Book tour</button>
                                </form>
                            <?php
                            }
                            ?>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </section>

        <section class="past-tours">
            <h1>Past Tours</h1>
            <div class="available-tour-div">
                <?php
                if (isset($ptour_arr[0]['message'])) {
                ?>
                    <div class='no-tour'>
                        <h3 class='message'>No past tours.</h3>
                    </div>
                    <?php
                } else {
                    foreach ($ptour_arr as $key => $item) {
                    ?>
                        <div class="tour-item available-item">
                            <h3 class="tour-name"><?= $item['name'] ?></h3>
                            <h3 class="tour-name"><?= $item['college'] ?></h3>
                            <p class="tour-description">Company: <?= $item['company'] ?></p>
                            <p class="tour-description">Date: <?= $item['date'] ?></p>
                            <p class="tour-description">Number of attendees: <?= $item['number_people'] ?></p>
                            <p class="tour-description">Rating: <?= $item['rating'] ?></p>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </section>
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