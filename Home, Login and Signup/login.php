<?php
if (isset($_GET['type'])) {
    if ($_GET['type'] === 'company') {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $url = "https://industrialvisit-api.herokuapp.com/API/company/getHashCompany.php?email=$email";
        $json = file_get_contents($url);
        $company = json_decode($json, true);
        if (isset($company['data'][0]['message'])) {
            header("location: ./company_login.php?error=no_account");
        } else {
            if ($company['data'][0]['password'] === $password) {
                session_start();
                $_SESSION["company_id"] = $company['data'][0]['company_id'];
                header("location: ../Company/company-dashboard/company-dashboard.php");
            } else {
                header("location: ./company_login.php?error=wrong_password");
            }
        }
    } else {
        // Coordinator
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $url = "https://industrialvisit-api.herokuapp.com/API/coordinator/getHashCoordinator.php?email=$email";
        $json = file_get_contents($url);
        $data = json_decode($json, true);

        if (isset($data['data'][0]['message'])) {
            header("location: ./coordinator_login.php?error=no_account");
        } else {
            if ($data['data'][0]['password'] === $password) {
                session_start();
                $_SESSION["user_id"] = $data['data'][0]['user_id'];
                header("location: ../Coordinator/Coordinator-dashboard/coordinator-dashboard.php");
            } else {
                header("location: ./coordinator_login.php?error=wrong_password");
            }
        }
    }
} else {
    header("location: ../index.php");
}
