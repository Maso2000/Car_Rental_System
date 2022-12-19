<?php

$transmission = '';
$body_style = '';
$AC = 0;
$seats_count = 0;
$engine_capacity = 0;
$fuel_consumption = 0;
$air_bags_count = 0;
if (isset($_GET["plate_id"])) {


    include '../../classes/Models/Dbh.php';
    include '../../classes/Models/Car.php';
    include '../../classes/Controllers/CarController.php';


    $plateId = $_GET["plate_id"];

    $carSpecs = CarController::getCarSpecs($plateId);
    if ($carSpecs) {
        $transmission = $carSpecs['transmission'];
        $body_style = $carSpecs['body_style'];
        $AC = $carSpecs['AC'];
        $seats_count = $carSpecs['seats_count'];
        $engine_capacity = $carSpecs['engine_capacity'];
        $fuel_consumption = $carSpecs['fuel_consumption'];
        $air_bags_count = $carSpecs['air_bags_count'];
    }

}
if (isset($_POST["submit"])) {

    $plateId = $_POST["plate_id"];
    $transmission = $_POST["transmission"];
    $body_style = $_POST["body_style"];
    $seats_count = $_POST["seats_count"];
    $AC = $_POST["AC"];
    $air_bags_count = $_POST["air_bags_count"];
    $fuel_consumption = $_POST["fuel_consumption"];
    $engine_capacity = $_POST["engine_capacity"];


    include '../../classes/Models/Dbh.php';
    include '../../classes/Models/Car.php';
    include '../../classes/Controllers/CarController.php';


    CarController::modifySpec($plateId, $transmission, $body_style, $AC, $seats_count, $engine_capacity, $fuel_consumption, $air_bags_count);
    // $car->modifySpec($plateId);
    //header("Location: ../resources/Admin/viewAllCars.php");

}