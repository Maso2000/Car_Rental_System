<?php

if (isset($_POST["submit"])) {

    $plateId = $_POST["plate_id"];
    session_start();
    $_SESSION['plate_id'] = $plateId;

    $model = $_POST["model"];
    $price = $_POST["price"];
    $year = $_POST["year"];
    $car_image = $_POST["car_image"];
    $location = $_POST["location"];
    $status = $_POST["status"];
    $status = $_POST["status"];


    include '../../classes/Models/Dbh.php';
    include '../../classes/Models/Car.php';
    include '../../classes/Controllers/CarController.php';

    $car = new CarController($plateId, $model, $price, $year, $status, $car_image, $location);
    $car->modifyCar();
    header("Location: ../../resources/Admin/viewAllCars.php");

}