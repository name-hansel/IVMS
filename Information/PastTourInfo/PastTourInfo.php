<?php
$url = 'http://localhost/IVMS-API/API/tour/getInfoPastTours.php';
$json_data = file_get_contents($url);
$btour_arr = json_decode($json_data, true);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Past Tours</title>
    <link rel="stylesheet" type="text/css" href="PastTour.css">
    <link href="https://fonts.googleapis.com/css2?family=Alata&family=Montserrat:wght@300&family=Open+Sans&display=swap" rel="stylesheet">
</head>
<body>
    <div class="head">
        <h1>Industrial Visit Management System</h1>
        <nav class="navb">
            <ul>
                <li class="items"><a href="../../index.php">Home</a></li>
                <li class="items"><a href="../About.html">About</a></li>
                <li class="items" id="tlist"><a href="#">Tours</a>
                    <ul class="tourlist">
                        <li><a href="../AvailableTourInfo/AvailableToursInfo.php">Available Tours</a></li>
                        <li><a href="PastTourInfo.php">Past Tours</a></li>
                    </ul>
                </li>
                <li class="items"><a href="../CompanyInfo/CompanyInfo.php">Companies</a></li>
                <li class="items"><a href="Login">Login/Sign up</a></li>
            </ul>
        </nav>
    </div>
    <br><br>
    <!-- btour_id,college,name,company,no_of_people,rating,date -->
    <section class="content">
        <?php
        if (isset($tour_arr[0]['message'])) {
        ?>
        <div class='no-tour'>
            <h3 class='message'>No tours.</h3>
        </div>
        <?php
        }
        else{
            foreach ($btour_arr as $key => $item) {
        ?>
        <div class="card">
            <h5 class="bid"><?= $item['btour_id'] ?></h5>
            <h5 class="clg"><?= $item['college'] ?></h5>
            <h1 class="tname"><?= $item['name'] ?></h1>
            <h2 class="cname"><?= $item['company'] ?></h2>
            <h3 class="nop"><?= $item['number_people'] ?></h3>
            <h3 class="ratg">Rating&nbsp;<?= $item['rating'] ?></h3>
            <h4 class="dov">Date&nbsp;<?= $item['date'] ?></h4>
            <div class="sign_in">
                <a href="#" class="btn">Sign Up to Book</a>
            </div>
            <br>
        </div>
        <?php
        }
    }
        ?>

    </section>

    <div class="footer">
        <div class="socials">
            <div class="site twitter">
                <img src="../images/twitter.svg" alt="" width="15px">
                <a href="">Twitter</a>
            </div>
            <div class="site facebook">
                <img src="../images/facebook.svg" alt="" width="15px">
                <a href="">Facebook</a>
            </div>
            <div class="site instagram">
                <img src="../images/instagram.svg" alt="" width="15px">
                <a href="">Instagram</a>
            </div>
        </div>
        <div class="contact">
            <h4>Email Address: ivsm@gmail.com</h4><br>
            <h4>Contact Number: 222-222-222</h4>
        </div>
    </div>	
</body>
</html>