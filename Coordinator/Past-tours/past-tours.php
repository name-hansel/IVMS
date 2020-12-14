<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("location: ../../index.php");
}
$user_id = $_SESSION['user_id'];
$url = "https://industrialvisit-api.herokuapp.com/API/bookedTour/getCoordinatorPastTours.php?user_id=$user_id";
$json_data = file_get_contents($url);
$tourArray = json_decode($json_data, true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Past Tours</title>
    <link rel="stylesheet" href="past_tours.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.0/axios.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        const openRating = () => {
            let btour_id = document.btour.btourid.value;
            swal({
                text: 'Enter your rating (out of five)',
                content: "input",
                button: {
                    text: "Rate!",
                    closeModal: false,
                },
            }).then(rating => {
                if (rating > 5 || rating < 0 || rating == null || rating == "") {
                    swal("Please enter a valid rating", "", 'error');
                    return false;
                } else {
                    axios.post('https://industrialvisit-api.herokuapp.com/API/bookedTour/postTourRating.php', {
                        btour_id,
                        rating
                    }).then(function(response) {
                        if (response.data.message === "Ratings Stored.") {
                            swal("Tour rated!", "", "success");
                            setTimeout(() => {
                                location.reload()
                            }, 1000);
                        } else {
                            swal("Something went wrong.", "", "error")
                        }
                    });
                }
            });
            return false;
        }
    </script>
</head>

<body>
    <!-- header -->
    <header class="header">
        <h1><a href="../../index.php" class="link">Industrial Visit Management System</a></h1>
        <div class="header-right">
            <h5>Your Past Tours</h5>
        </div>
    </header>

    <div class="sidebar">
        <img src="../../Company/images/person.png" alt="" width="180" />
        <div class="sidebar-links">
            <a href="../Coordinator-dashboard/coordinator-dashboard.php">Dashboard</a>
            <a href="../view-tours/view-tours.php">View All Tours</a>
            <a href="../Scheduled-tours/scheduled-tours.php">View Scheduled Tours</a>
            <a href="" id="active">View Past Tours</a>
        </div>
    </div>

    <main class="content">
        <!-- content heading -->
        <header class="content-header">
            <h2 id="main-heading">Your Past Tours</h2>
            <div class="content-header-icons">
                <a href="../logout.php"><img src="../images/logout.svg" alt="" width="32" /></a>
            </div>
        </header>

        <!-- past tours -->
        <div class="tour-container">
            <?php
            if (isset($tourArray['data'][0]['message'])) {
            ?>
                <div class='no-tour'>
                    <h3 class='message'>No past tours.</h3>
                </div>
                <?php
            } else {
                foreach ($tourArray['data'] as $key => $item) {
                ?>
                    <section class="tour-card">
                        <div class="tour-heading">
                            <h2 class="tour-title"><?= $item['name'] ?></h2>
                            <h3 class="tour-college"><?= $item['company'] ?></h3>
                            <h3 class="tour-date"><?= $item['date'] ?></h3>
                        </div>
                        <div class="tour-details">
                            <h3 class="tour-booked">Booked at: <?= substr($item['booked_at'], 0, 10) ?></h3>
                            <h4 class="tour-people">Number of Attendees: <?= $item['number_people'] ?></h4>
                        </div>
                        <div class="description">
                            <div class="rating">
                                <h3 class="tour-rating">Average Rating: <?= $item['rating'] ?>/5</h3>
                            </div>
                        </div>
                        <form name="btour" action="" onsubmit="return openRating();">
                            <input type="hidden" name="btourid" value="<?= $item['btour_id'] ?>">
                            <button class="rate-button">Rate tour</button>
                        </form>
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