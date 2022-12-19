<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental_system";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if(isset($_GET['res_id'])){

    $res_id =  $_GET['res_id'];
    $plate_id =  $_GET['plate_id'];

        $sql = "
        SELECT * FROM reservation 
        WHERE plate_id = '".$plate_id."';";
    
        if($result = mysqli_query($conn, $sql)){
            $res = mysqli_fetch_all($result, MYSQLI_ASSOC)[0];

            $sql = "
            SELECT * FROM car 
            WHERE plate_id = '".$plate_id."';";
        
            if($result = mysqli_query($conn, $sql)){
                $car = mysqli_fetch_all($result, MYSQLI_ASSOC)[0];
                $price =$car['price'];
                $image_link = $car['image_link'];
            }
            else
            $price = 0;


    $res_date =$res['res_date'];
    $ret_date =$res['return_date'];
    $plate_id =$res['plate_id'];
    
   // $price =$res['price'];

    $d1 = strtotime($res_date);
    $d2 = strtotime($ret_date);
    $datediff = $d2 - $d1;
    $rent_days = round($datediff / (60 * 60 * 24));

    if($rent_days==0)
        $rent_days = 1;
    $total_amount = $price * $rent_days;

        }       
}

if(isset($_POST['submit_pay'])){

    $res_id = $_POST['res_id'];
    $total_amount = $_POST['total_amount'];

    $sql = "
    UPDATE reservation 
    SET amount_paid = '".$total_amount."'
    WHERE res_id = '".$res_id."';";

    if($result = mysqli_query($conn, $sql)){
        header("Location: ../../resources/Customer/paymentDone.php");
    }
}

?>