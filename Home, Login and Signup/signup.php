<?php
if (isset($_GET['type'])) {
    if ($_GET['type'] === 'coordinator') {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $phone_number = $_POST['phn'];
        $college = $_POST['college'];
        $url = "http://localhost/IVMS-API/API/coordinator/postUserCoordinator.php";
        $data = array('email' => $email, 'password' => $password, 'phone_number' => $phone_number, 'college' => $college);
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'POST',
                'content' => json_encode($data),
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result['message'] === 'successful') {
            // start session here
            echo "YES!!";
        } else {
            header("location: ./coordinator_signup.html");
        }
    } else {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $phone_number = $_POST['phn'];
        $company = $_POST['company'];
        $description = $_POST['description'];
        $url = "http://localhost/IVMS-API/API/company/postUserCompany.php";
        $data = array('email' => $email, 'password' => $password, 'phone_number' => $phone_number, 'company' => $company, 'description' => $description);
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'POST',
                'content' => json_encode($data),
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        print($result);
        if ($result['message'] === 'company Created') {
            // start session here
            echo "YES!!";
        } else {
            header("location: ./company_signup.html");
        }
    }
} else {
    header("location: ../index.php");
}
