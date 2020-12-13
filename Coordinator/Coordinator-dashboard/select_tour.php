<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("location: ../../index.php");
}
if (!isset($_POST['select_id'])) {
  header("location: ./coordinator-dashboard.php");
}
$user_id = $_SESSION['user_id'];
$tour_id = $_POST['select_id'];
$url = "https://industrialvisit-api.herokuapp.com/API/tour/getTourDetails.php?tour_id=$tour_id";
$json_data = file_get_contents($url);
$tour_array = json_decode($json_data, true);
$tour_array = $tour_array[0];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Book Tour</title>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="script.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
  <link rel="stylesheet" href="select_tour.css" />
</head>

<body>
  <!-- header -->
  <div class="header">
    <h1><a href="../../index.php" class="link">Industrial Visit Management System</a></h1>
    <div class="header-right">
      <h5>Tour Booking</h5>
    </div>
  </div>

  <!-- sidebar -->
  <div class="sidebar">
    <img src="../../Company/images/person.png" alt="" width="180" />
    <div class="sidebar-links">
      <a href="../Coordinator-dashboard/coordinator-dashboard.php">Dashboard</a>
      <a href="../view-tours/view-tours.php">View All Tours</a>
      <a href="../Scheduled-tours/scheduled-tours.php">View Scheduled Tours</a>
      <a href="../View-tours/view-tours.php">View Past Tours</a>
    </div>
  </div>

  <!-- content -->
  <div class="content">
    <h3 class="form-heading">Enter Details</h3>
    <div class="tour-card">
      <h1><?= $tour_array['name'] ?></h1>
      <h2>Branch: <?= $tour_array['branch'] ?></h2>
      <h2>Capacity: <?= $tour_array['number_people'] ?></h2>
      <h2>Address: <?= $tour_array['place'] ?></h2>
      <h4>Date: <?= $tour_array['available_days'] ?></h4>
      <p>
        <?= $tour_array['description'] ?>
      </p>
      <h4><i class="fa fa-inr" aria-hidden="true"></i>
        <?= $tour_array['rate'] ?></h4>
    </div>
    <form name="tour" onSubmit="return formValidation()" method="POST" action="book_tour.php">
      <!-- hidden inputs -->
      <input type="hidden" name="max_people" value="<?= $tour_array['number_people'] ?>">
      <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
      <input type="hidden" name="tour_id" value="<?= $tour_id ?>">
      <input type="hidden" name="available_days" value="<?= $tour_array['available_days'] ?>">

      <div class="form-element">
        <label for="name" class="form-label">Enter Number of People</label>
        <input type="number" name="number_people" class="form-input" required />
        <p class="error" id="number-error">Please enter a valid number.</p>
      </div>
      <button type="submit" class="add-tour-btn">Confirm tour</button>
    </form>
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