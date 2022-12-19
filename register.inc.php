<?php

if (isset($_POST["submit"])) {

    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    $ssn = $_POST['ssn'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $profileImage = $_POST['profile_image'];

    include '../classes/Models/Dbh.php';
    include '../classes/Models/Register.php';
    include '../classes/Controllers/RegisterController.php';

    $register = new RegisterController($email, $name, $password,$ssn, $address, $phone,$profileImage);
    $register->register();

    header("Location: ../resources/Customer/index.php");
}