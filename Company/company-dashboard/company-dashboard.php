<?php
$url = 'http://localhost/IVMS-API/API/tour/getSampleCompanyData.php?company_id=1';
$json_data = file_get_contents($url);
$tour_array = json_decode($json_data, true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Company Dashboard</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <!-- header -->
  <div class="header">
    <h1>Industrial Visit Management System</h1>
    <div class="header-right">
      <h5>Company Dashboard</h5>
    </div>
  </div>

  <!-- sidebar -->
  <div class="sidebar">
    <img src="../images/logo.png" alt="" width="180" />
    <div class="sidebar-links">
      <a href="" id="active">Dashboard</a>
      <a href="../add-new-tour/add-new-tour.php">Add New Tour</a>
      <a href="../your-tours/your-tours.php">View Your Tours</a>
      <a href="../scheduled-tours/scheduled-tours.php">View Scheduled Tours</a>
      <a href="../past-tours/past-tours.php">View Past Tours</a>
    </div>
  </div>

  <!-- content -->
  <div class="content">
    <!-- content header -->
    <div class="content-header">
      <!-- TODO change company name -->
      <h2 id="main-heading">Hello, ABC Company.</h2>
      <div class="content-header-icons">
        <a href=""><img src="../images/user.svg" alt="" width="35" /></a>
        <a href=""><img src="../images/logout.svg" alt="" width="32" /></a>
      </div>
    </div>

    <!-- tours -->
    <div class="sample-tours">
      <div class="sample-tours-head-div">
        <h4 id="sample-tours-heading">Your Tours</h4>
        <button class="view-all">
          <a href="../your-tours/your-tours.php">
            View All <img src="../images/arrow.svg" alt="" width="12px" />
          </a></button>
      </div>
      <div class="sample-tours-container">
        <?php
        if (isset($tour_array['data']['tourData'][0]['message'])) {
        ?>
          <div class='no-tour'>
            <h3 class='message'>No tours.</h3>
          </div>
          <?php
        } else {
          foreach ($tour_array['data']['tourData'] as $key => $item) {
          ?>
            <div class="tour-card">
              <h3 id="tour-name"><?= $item['name'] ?></h3>
              <h4 id="tour-branch"><?= $item['branch'] ?></h4>
              <h4 id="tour-place"><?= $item['place'] ?></h4>
              <h5 id="tour-rate"><?= $item['rate'] ?></h5>
            </div>
        <?php
          }
        }
        ?>
      </div>
    </div>

    <!-- booked -->
    <div class="booked-tours">
      <div class="sample-tours-head-div">
        <h4 id="sample-tours-heading">Booked Tours</h4>
        <button class="view-all">
          <a href="../scheduled-tours/scheduled-tours.php">
            View All <img src="../images/arrow.svg" alt="" width="12px" /></a>
        </button>
      </div>

      <div class="sample-tours-container">
        <?php
        if (isset($tour_array['data']['bookedTourData'][0]['message'])) {
        ?>
          <div class='no-tour'>
            <h3 class='message'>No booked tours.</h3>
          </div>
          <?php
        } else {
          foreach ($tour_array['data']['bookedTourData'] as $key => $item) {
          ?>
            <div class="tour-card">
              <h3 id="btour-name"><?= $item['name'] ?></h3>
              <h4 id="btour-date"><?= $item['available_days'] ?></h4>
              <h4 id="btour-college"><?= $item['college'] ?></h4>
            </div>
        <?php
          }
        }
        ?>
      </div>
    </div>
  </div>

  <!-- footer -->
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