<?php
$url = "http://localhost/IVMS-API/API/tour/getHomeTour.php";
$jsonData = file_get_contents($url);
$tourData = json_decode($jsonData, true);

$url = "http://localhost/IVMS-API/API/company/getHomeCompany.php";
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
      <a href="">Login</a>
      <a href="">Register</a>
    </div>
  </header>

  <nav>
    <a href="">Tours</a>
    <a href="">About Us</a>
    <a href="">Companies</a>
  </nav>

  <div class="banner">
    <img src="https://www.springwise.com/wp-content/uploads/2018/08/Data_Center_Norway_Smart_City_Springwise.jpg" alt="" />
  </div>

  <main>
    <section class="tours">
      <h1>Tours Available</h1>
      <div class="tour-div">
        <?php
        foreach ($tourData['data'] as $key => $item) {
        ?>
          <div class="tour-item">
            <h3 class="tour-name"><?= $item['name'] ?></h3>
            <p class="tour-description"><?= $item['description'] ?></p>
          </div>
        <?php
        }
        ?>
      </div>
    </section>

    <section class="companies">
      <h1>Companies Available</h1>
      <div class="company-div">
        <?php
        foreach ($companyData['data'] as $key => $item) {
        ?>
          <div class="company-item">
            <h3 class="company-name"><?= $item['company'] ?></h3>
            <p class="company-description"><?= $item['description'] ?></p>
          </div>
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