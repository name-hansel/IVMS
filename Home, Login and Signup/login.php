<?php
if (isset($_GET['type'])) {
    if ($_GET['type'] === 'company') {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $url = "http://localhost/IVMS-API/API/company/getHashCompany.php?email=$email";
        $json = file_get_contents($url);
        $company = json_decode($json, true);
        if (isset($company['data'][0]['message'])) {
            header("location: ./company_login.html?error=no_account");
        } else {
            if ($company['data'][0]['password'] === $password) {
                // open session and redirect
            } else {
                header("location: ./company_login.html?error=wrong_password");
            }
        }
    } else {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $url = "http://localhost/IVMS-API/API/coordinator/getHashCoordinator.php?email=$email";
        $json = file_get_contents($url);
        $data = json_decode($json);
        if (isset($data['data'][0]['message'])) {
            header("location: ./coordinator_login.html?error=no_account");
        } else {
            if ($data['data'][0]['password'] === $password) {
                // open session and redirect
            } else {
                header("location: ./coordinator_login.html?error=wrong_password");
            }
        }
    }
} else {
    header("location: ../index.php");
}
