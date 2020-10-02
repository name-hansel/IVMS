<?php
$url = 'http://localhost/IVMS-API/API/tour/postNewTour.php';
$data = array(
    'name' => $_POST['name'],
    'branch' => $_POST['branch'],
    // TODO change company_id -> $_SESSION['company_id']
    // TODO add styling to messages
    'company_id' => 1,
    'place' => $_POST['place'],
    'number_people' => $_POST['number_people'],
    'available_days' => $_POST['available_days'],
    'rate' => $_POST['rate'],
    'description' => $_POST['description']
);

$options = array(
    'http' => array(
        'header'  => "Content-type: application/json",
        'method'  => 'POST',
        'content' => json_encode($data)
    )
);

$context  = stream_context_create($options);
$json_data = file_get_contents($url, false, $context);
$tour_array = json_decode($json_data, true);
$confirm = false;
if ($tour_array['message'] === "Tour Created") {
    $confirm = true;
}
?>

<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>New Tour Confirmation</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <!-- header -->
    <div class="header">
        <h1>Industrial Visit Management System</h1>
        <div class="header-right">
            <h5>New Tour Confirmation</h5>
        </div>
    </div>

    <!-- sidebar -->
    <div class="sidebar">
        <img src="../images/logo.png" alt="" width="180" />
        <div class="sidebar-links">
            <a href="add-new-tour.php" id="active">Add New Tour</a>
            <a href="">View Tour Catalog</a>
            <a href="">View Scheduled Tours</a>
            <a href="">Edit Tour</a>
            <a href="">View Past Tours</a>
        </div>
    </div>

    <div class="content" style="margin-left: 200px;">
        <div class="confirmation">
            <?php
            if ($confirm) {
                echo "<img src='../images/checked.svg' width=200px />
                <h3 class='form-heading'>Tour has been created!</h3>";
            } else {
                echo "<img src='../images/close.svg' width=200px />
                <h3 class='form-heading'>Some error has occurred.<br> Please try again.</h3>";
            }

            echo "<a href='../company-dashboard/company-dashboard.php' class='link'>back to dashboard</a>";
            ?>
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