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


if (isset($_POST['submit'])) {
    $plate_id = $_POST['plate_id'];
    $res_date = $_POST['res_date'];
    $ret_date = $_POST['ret_date'];
    $location = $_POST['location'];
    $cust_id = $_POST['cust_id'];

    // echo $res_date;
    // echo $ret_date;

    

    $sql = "
    SELECT * FROM reservation 
    WHERE plate_id = '".$plate_id."'
    AND( 
    '".$res_date."'  BETWEEN res_date AND return_date
    OR 
    '".$ret_date."'  BETWEEN res_date AND return_date)";

    

    if($result = mysqli_query($conn, $sql)){

        if($result->num_rows ==0 ){

            $sql = "
            INSERT INTO reservation (plate_id, res_date, return_date , cust_id ,location)
                VALUES ('".$plate_id."','".$res_date."','".$ret_date."','".$cust_id."','".$location."');";
        
            if($result = mysqli_query($conn, $sql)){
                $sql = "SELECT LAST_INSERT_ID() AS res_id;";
                $result = mysqli_query($conn, $sql);
                $res_id = mysqli_fetch_all($result, MYSQLI_ASSOC)[0]['res_id'];
                
            header("Location: ../../resources/Customer/payment.php?res_id=".$res_id."&plate_id=".$plate_id);

            }
                else
                header("Location: ../../resources/Customer/reserved.php?plate_id=".$plate_id."&error=true");
        }
        else{
            header("Location: ../../resources/Customer/reserved.php?plate_id=".$plate_id."&error=wrongDate");
        }
       
       // header("Location: ../../resources/Customer/payment.php");

    }
        else
        header("Location: ../../resources/Customer/reserved.php?plate_id=".$plate_id."&error=true");
    
  
    }



if (isset($_GET['plate_id'])) {
    $sql = "select * from car where status LIKE 'Active' AND plate_id =" . $_GET['plate_id'];
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows == 0)
        header("Location: ../../resources/Customer/index.php?error=carOutOfService");

    $car = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $car = $car[0];


    $sql = "select * from specs where plate_id =" . $_GET['plate_id'];
    $result = mysqli_query($conn, $sql);

    $specs = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $specs = $specs[0];
}


//VALIDATIONS
$error = "";

if(isset($_GET['error']))
{
    if($_GET['error'] == "carOutOfService")
        $error = "Car Out Of Service";

    else if($_GET['error'] =='wrongDate')
        $error = "This Car is Already Reserved In This Date Range";
    else{
        $error = "An Error Has Occured";
    }

   
}
