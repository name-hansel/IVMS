<?php
session_start();
$url = "https://industrialvisit-api.herokuapp.com/API/tour/getHomeTour.php";
$jsonData = file_get_contents($url);
$tourData = json_decode($jsonData, true);

$url = "https://industrialvisit-api.herokuapp.com/API/company/getHomeCompany.php";
$jsonData = file_get_contents($url);
$companyData = json_decode($jsonData, true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>Industrial Visit Management System</title>
</head>

<body>
  <header>
    <h1>Industrial Visit Management System</h1>
    <div class="header-right">
      <?php
      if (!isset($_SESSION['user_id']) && !isset($_SESSION['company_id'])) {
      ?>
        <a href="login.php">Login</a>
        <a href="register.php">Sign Up</a>
      <?php
      } elseif (isset($_SESSION['user_id'])) {
      ?>
        <a href="Coordinator/coordinator-dashboard/coordinator-dashboard.php">Dashboard</a>
      <?php
      } elseif (isset($_SESSION['company_id'])) {
      ?>
        <a href="Company/company-dashboard/company-dashboard.php">Dashboard</a>
      <?php
      }
      ?>
    </div>
  </header>

  <nav>
    <a href="./Information/AvailableTourInfo/available-tours.php">Tours</a>
    <a href="./Information/About.html">About Us</a>
    <a href="./Information/CompanyInfo/CompanyInfo.php">Companies</a>
  </nav>

  <div class="banner">
    <img src="https://www.springwise.com/wp-content/uploads/2018/08/Data_Center_Norway_Smart_City_Springwise.jpg" alt="" />
  </div>

  <main>
    <section class="tours">
      <h1><a class="view-more" href="./Information/AvailableTourInfo/available-tours.php">Tours Available</a></h1>
      <div class="tour-div">
        <?php
        if (isset($tourData['message'])) {
        ?>
          <div class='no-tour'>
            <h3 class='message'>No tours.</h3>
          </div>
          <?php
        } else {
          foreach ($tourData['data'] as $key => $item) {
          ?>
            <div class="tour-item">
              <h3 class="tour-name"><?= $item['name'] ?></h3>
              <p class="tour-description"><?= $item['branch'] ?></p>
              <p class="tour-description"><?= $item['date'] ?></p>
            </div>
          <?php
          }
          ?>
        <?php
        }
        ?>
      </div>
    </section>

    <section class="companies">
      <h1><a href="./Information/CompanyInfo/CompanyInfo.php" class="view-more">Companies Available</a></h1>
      <div class="company-div">
        <?php
        if (isset($companyData['message'])) {
        ?>
          <div class='no-tour'>
            <h3 class='message'>No companies.</h3>
          </div>
        <?php
        } else {
        ?>
          <?php
          foreach ($companyData['data'] as $key => $item) {
          ?>
            <div class="company-item">
              <h3 class="company-name"><?= $item['company'] ?></h3>
            </div>
          <?php
          }
          ?>
        <?php
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