<?php
if (isset($_POST["submit"])) {
    session_start();
    $transmission = $_POST["transmission"];
    $body_style = $_POST["body_style"];
    $seats_count = $_POST["seat_count"];
    $engine_capacity = $_POST["engine_capacity"];
    $fuel_consumption = $_POST["fuel_consumption"];
    $air_bags_count = $_POST["air_bag_count"];

    if (isset($_POST["AC"]))
        $ac = $_POST["AC"];
    else
        $ac = 0;

    include '../../classes/Models/Dbh.php';
    include '../../classes/Models/Car.php';
    include '../../classes/Controllers/CarController.php';

    CarController::addSpec($_SESSION['plate_id'], $transmission, $body_style,$ac, $seats_count, $engine_capacity, $fuel_consumption, $air_bags_count);

    header("Location: ../../resources/Admin/viewAllCars.php");

}