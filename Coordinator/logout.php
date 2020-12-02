<?php
session_start();
if (isset($_SESSION['company_id'])) {
    unset($_SESSION["company_id"]);
    session_destroy();
} elseif (isset($_SESSION['user_id'])) {
    unset($_SESSION["user_id"]);
    session_destroy();
}
header("location: ../index.php");
