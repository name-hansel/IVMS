<?php
// TODO change company_id
$url = 'http://localhost/IVMS-API/API/tour/getCompanyTours.php?company_id=1';
$json_data = file_get_contents($url);
$tourArray = json_decode($json_data, true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Your Tours</title>
    <link rel="stylesheet" href="style.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.0/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="script.js"></script>
</head>

<body>
    <!-- header -->
    <header class="header">
        <h1>Industrial Visit Management System</h1>
        <div class="header-right">
            <h5>Your Tours</h5>
        </div>
    </header>

    <!-- sidebar -->
    <div class="sidebar">
        <img src="../images/logo.png" alt="" width="180" />
        <div class="sidebar-links">
            <a href="../company-dashboard/company-dashboard.php">Dashboard</a>
            <a href="../add-new-tour/add-new-tour.php">Add New Tour</a>
            <a href="" id="active">View Your Tours</a>
            <a href="../scheduled-tours/scheduled-tours.php">View Scheduled Tours</a>
            <a href="">View Past Tours</a>
        </div>
    </div>

    <!-- main content -->
    <main class="content">
        <!-- content header -->
        <header class="content-header">
            <h2 id="main-heading">Your Tours</h2>
            <div class="content-header-icons">
                <a href=""><img src="../images/user.svg" alt="" width="35" /></a>
                <a href=""><img src="../images/logout.svg" alt="" width="32" /></a>
            </div>
        </header>

        <!-- tour cards -->
        <div class="tour-container">
            <?php
            if (isset($tourArray['data'][0]['message'])) {
            ?>
                <div class='no-tour'>
                    <h3 class='message'>No tours.</h3>
                </div>
                <?php
            } else {
                foreach ($tourArray['data'] as $key => $item) {
                ?>
                    <section class="tour-card">
                        <div class="tour-options">
                            <button class="edit" id="<?= $item[' tour_id'] ?>">
                                <i class="fa fa-edit" class="option" alt="edit tour"></i>
                            </button>
                            <button class="delete" id="<?= $item[' tour_id'] ?>">
                                <i class="fa fa-trash fa-sm" class="option" alt="delete tour"></i>
                            </button>
                        </div>
                        <div class="tour-heading">
                            <h2 class="tour-title"><?= $item['name'] ?></h2>
                            <h3 class="tour-branch"><?= $item['branch'] ?></h3>
                            <h3 class="tour-date"><?= $item['available_days'] ?></h3>
                            <h3><?= $item['rate'] ?></h3>
                        </div>
                        <div class="tour-details">
                            <h3 class="tour-place"><?= $item['place'] ?></h3>
                            <h4 class="tour-people">Capacity: <?= $item['number_people'] ?></h4>
                            <div class="tour-times-div">
                                <h4 class="tour-times">Created at: <?= substr($item['created_at'], 0, 10) ?></h4>
                                <h4 class="tour-times">Edited at: <?= substr($item['edited_at'], 0, 10) ?></h4>
                            </div>
                        </div>
                        <div class="description">
                            <p class="tour-description">
                                <?= $item['description'] ?>
                            </p>
                            <div class="rating">
                                <h3 class="tour-rating">Average Rating: <?= $item['avg_rating'] ?></h3>
                            </div>
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