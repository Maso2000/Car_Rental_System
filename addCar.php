<?php

//TODO : ADD CAR PAGE :
//1 - ADD CAR FORM
//2-ADD CAR SPECS
//3 - INSERT BOTH IN DATABASE

//THIS PAGE CAN BE FOR ADD NEW CAR OR MODIFY EXISTING CAR (using GET) 
//EX: _GET['action'] = 'add' => ADD CAR / _GET['action'] = 'modify' => modify CAR 
?>

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Add Car</title>
    <link rel="stylesheet" href="../css/login_style.css">
</head>
<body>
<header>
    <?php
    if (!isset($_SESSION["admin_id"])) {
        //UNAUTHORIZED USER
        header("Location: ../../index.php?error=unAuth");
        session_destroy();
    }
    ?>
</header>

<div>
    <form id="register_form" class="form_register" method="POST" action="../../includes/Admin/addCar.inc.php"
          onsubmit="return validateCar()">
        <h2>Add Car</h2>
        <div class="error" id="error"><?php include '../partials/Admin/addCar.validate.php'; ?></div>
        <div>
            <label for="plate_id">Plate ID</label>
            <input type="text" id="plate_id" name="plate_id" placeholder="Plate ID">
        </div>

        <div>
            <label for="model">Model</label>
            <input type="text" id="model" name="model" placeholder="model">
        </div>

        <div>
            <label for="year">Year</label>
            <input type="text" id="year" name="year" placeholder="year">

        </div>


        <div>
            <label for="location">Location</label>
            <input type="text" id="location" name="location" placeholder="location">
        </div>

        <div>
            <label for="price">Price/Day</label>
            <input type="money_format" id="price" name="price" placeholder="price">
        </div>

        <div>
            <label for="car_image">Car Image Link</label>
            <input type="text" id="car_image" name="car_image" placeholder="Car Image Link">
        </div>

        
        <div>
            <label for="status">Car Status</label>
            <input type="text" id="status" name="status" placeholder="Car Status">
        </div>
        <br/>

        <div>
            <button type="submit" name="submit">Add Car</button>
        </div>


    </form>

</div>


<script src="../../js/car.js"></script>

</body>
</html>