<?php
if (isset($_GET['type'])) {
    // Coordinator
    if ($_GET['type'] === 'coordinator') {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $phone_number = $_POST['phn'];
        $college = $_POST['college'];
        // Check if email exists
        $url = "https://industrialvisit-api.herokuapp.com/API/coordinator/getCoordinatorEmailExist.php?email=$email";
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        if ($data[0]['exist'] == 1) {
            header("location: ./coordinator_signup.php?msg=user-exists");
            die();
        }
        // Add user
        $url = "https://industrialvisit-api.herokuapp.com/API/coordinator/postUserCoordinator.php";
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
        $result = json_decode($result, true);
        if ($result['message'] === 'successful') {
            header("location: ./coordinator_login.php?msg=success");
        } else {
            header("location: ./coordinator_signup.php?msg=error");
        }
    } else {
        // Company
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $phone_number = $_POST['phn'];
        $company = $_POST['company'];
        $description = $_POST['description'];
        // Check if email exists
        $url = "https://industrialvisit-api.herokuapp.com/API/company/getCompanyEmailExist.php?email=$email";
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        if ($data[0]['exist'] == 1) {
            header("location: ./company_signup.php?msg=user-exists");
            die();
        }

        // Add user
        $url = "https://industrialvisit-api.herokuapp.com/API/company/postUserCompany.php";
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
        $result = json_decode($result, true);
        if ($result['message'] === "company Created") {
            header("location: ./company_login.php?msg=success");
        } else {
            header("location: ./company_signup.php?msg=error");
        }
    }
} else {
    header("location: ../index.php");
}
