<?php
session_start();
$user_id = $_POST['user_id'];
$tour_id = $_POST['tour_id'];
$number_people = $_POST['number_people'];
$available_days = $_POST['available_days'];
$url = "https://industrialvisit-api.herokuapp.com/API/bookedTour/postBookedTour.php";
$data = array('user_id' => $user_id, 'tour_id' => $tour_id, 'number_people' => $number_people, 'date' => $available_days);
$options = array(
    'http' => array(
        'header'  => "Content-type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$result = json_decode($result, true);
if ($result['message'] === "Record Created") {
    header("location: ./coordinator-dashboard.php?msg=success");
} else {
    header("location: ./coordinator-dashboard.php?msg=error");
}
