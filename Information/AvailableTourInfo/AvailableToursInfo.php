<?php
$url = 'http://localhost/IVMS-API/API/tour/getInfoAllTours.php';
$json_data = file_get_contents($url);
$tour_arr = json_decode($json_data, true);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Available Tours</title>
	<link rel="stylesheet" type="text/css" href="Avtour.css">
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
                        <li><a href="AvailableToursInfo.php">Available Tours</a></li>
                        <li><a href="../ptour.html">Past Tours</a></li>
                    </ul>
                </li>
                <li class="items"><a href="../CompanyInfo/CompanyInfo.php">Companies</a></li>
                <li class="items"><a href="Login">Login/Sign up</a></li>
            </ul>
        </nav>
    </div>
    <br><br>

  <!-- tour_id,name,branch,company,description,place,avg_rating -->
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
            foreach ($tour_arr as $key => $item) {
        ?>
    <div class="card">
      <h5 class="tid"><?= $item['tour_id'] ?></h5>
      <h1 class="tname"><?= $item['name'] ?></h1>
      <h2 class="cname"><?= $item['branch'] ?></h2>
      <h3 class="branch"><?= $item['company'] ?></h3>
      <p class="desc"><?= $item['place'] ?></p>
      <h4 class="place"><?= $item['description'] ?></h4>
      <h3 class="ratg">Rating:&nbsp;<?= $item['avg_rating'] ?> </h3>
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

   <br><br>
   <div class="footer">
    <div class="socials">
        <div class="site twitter">
            <img src="../images/twitter.svg" alt="" width="15px">
            <a href="">Twitter</a>
        </div>
        <div class="site facebook">
            <img src="images/facebook.svg" alt="" width="15px">
            <a href="">Facebook</a>
        </div>
        <div class="site instagram">
            <img src="images/instagram.svg" alt="" width="15px">
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