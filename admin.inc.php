<?php
//session_start();
//echo "inc\n";
//echo $_SESSION["admin_id"];
global $admin;

if (isset($_SESSION["admin_id"])) {

    include  '../../classes/Models/Dbh.php';
    include '../../classes/Models/Admin.php';
    include '../../classes/Controllers/AdminController.php';

    $id = $_SESSION["admin_id"];
    $controller = new AdminController();
    $admin = $controller->getAdmin($id);
    $reservationCount = $controller->getReservationCount();
    $customerCount = $controller->getCustomerCount();
    $CarsCount = $controller->getCarsCount();
    $revenue = $controller->getRentRevenue();

       
    if($admin->getAdminName()==null)
    $admin = $controller->getAdmin($id);

    $admin_name = $admin->getAdminName();

    

   // echo "sdsdd";
    //echo $admin->getAdminname();
    //$admin = $_GET[$id];

    // echo $admin->ssn;

}
