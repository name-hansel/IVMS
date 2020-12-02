<?php
$sessionID = 1;
$tour_id = $_POST['select_id'];
$url = "http://localhost/IVMS-API/API/tour/getTourDetails.php?tour_id=$tour_id";
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
  <script>
    const coordinatorID = "<?php echo $sessionID ?>"
  </script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.0/axios.min.js"></script>
  <script src="script.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
  <link rel="stylesheet" href="select_tour.css" />
</head>

<body>
  <!-- header -->
  <div class="header">
    <h1>Industrial Visit Management System</h1>
    <div class="header-right">
      <h5>Tour Booking</h5>
    </div>
  </div>

  <!-- sidebar -->
  <div class="sidebar">
    <img src="../images/logo.png" alt="" width="180" />
    <div class="sidebar-links">
      <a href="../Coordinator-dashboard/coordinator-dashboard.php">Dashboard</a>
      <a href="../Scheduled-tours/scheduled_tours.php">View Scheduled Tours</a>
      <a href="">View Past Tours</a>
    </div>
  </div>

  <!-- content -->
  <div class="content">
    <h3 class="form-heading">Enter Details</h3>
    <div class="tour-card">
      <h1><?= $tour_array['name'] ?></h1>
      <h2><?= $tour_array['branch'] ?></h2>
      <h2><?= $tour_array['place'] ?></h2>
      <h4><?= $tour_array['available_days'] ?></h4>
      <p>
        <?= $tour_array['description'] ?>
      </p>
      <h4><?= $tour_array['rate'] ?></h4>
    </div>
    <form name="tour" onSubmit="return formValidation()" method="POST">
      <div class="form-element">
        <label for="name" class="form-label">Enter Number of People</label>
        <input type="text" name="name" class="form-input" required />
        <p class="error" id="name-error">Please enter a valid name.</p>
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