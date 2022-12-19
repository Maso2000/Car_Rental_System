<?php
ob_start();

session_start();
if (!isset($_SESSION["admin_id"])) {
    //UNAUTHORIZED USER
    header("Location: ../Login");
    session_destroy();
}


if (isset($_POST["submit"])) {

    $resId = $_POST["res_id"];


    include '../../classes/Models/Dbh.php';
    include '../../classes/Models/Admin.php';
    include '../../classes/Controllers/AdminController.php';

    $admin = new Admin();
     $admin->removeReservation($resId);
    header("Location: ../../resources/Admin/viewAllReservation.php");
}
?>