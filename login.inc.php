<?php

// $error = "Wrong Email or Password";
// if (!isset($_GET['error'])) {
//     echo "sdsds";
//     //if($_GET['error'] == "wrongUsernameOrPassword")
//         $error = "Wrong Email or Password";

// }
if (isset($_POST["submit"])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $isAdmin = false;

    if(isset($_POST['is_admin']))
        $isAdmin = $_POST['is_admin'];

    include '../classes/Models/Dbh.php';
    include '../classes/Models/Login.php';
    include '../classes/Controllers/LoginController.php';

    $login = new loginController($email, $password,$isAdmin);
    $login->login();
   // echo "sdsds";
    header("Location: ../Login/index.php?error=none");
}