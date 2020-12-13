<?php
session_start();
if (isset($_POST['new']) && isset($_SESSION['company_id'])) {
    $new = md5($_POST['new']);
    $company_id = $_SESSION['company_id'];
    $url = "https://industrialvisit-api.herokuapp.com/API/company/putCompanyHash.php";
    $data = array('company_id' => $company_id, 'password' => $new);
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/json\r\n",
            'method'  => 'PUT',
            'content' => json_encode($data),
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $result = json_decode($result, true);
    if ($result['message'] === 'Company password changed.') {
        header("location: ../company-dashboard/company-dashboard.php?msg=success");
    } else {
        header("location: ../company-dashboard/company-dashboard.php?msg=error");
    }
} else {
    header("location: ../company-dashboard/company-dashboard.php?msg=error");
}
