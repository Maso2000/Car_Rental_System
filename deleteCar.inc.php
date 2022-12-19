<?php
ob_start();

session_start();
if (!isset($_SESSION["admin_id"])) {
    //UNAUTHORIZED USER
    header("Location: ../Login");
}


if (isset($_POST["submit"])) {

    $plateId = $_POST["plate_id"];


    include '../../classes/Models/Dbh.php';
    include '../../classes/Models/Car.php';
    include '../../classes/Controllers/CarController.php';

    $car = new CarController($plateId, null, null, null, null, null, null);
    $car->removeCar($plateId);
    header("Location: ../../resources/Admin/viewAllCars.php");
}