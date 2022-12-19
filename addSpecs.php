
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
<header>
    <?php
    if (!isset($_SESSION["admin_id"])) {
        //UNAUTHORIZED USER
        header("Location: ../../index.php?error=unAuth");
        session_destroy();
    }
    ?>
</header>
<body>


<div>
    <form id="register_form" class="form_register" method="POST" action="../../includes/Admin/addSpecs.inc.php"
          onsubmit="return validateSpecs()">
        <h2>Add Car Specs Plate ID : <?php echo $_SESSION['plate_id']; ?></h2>
        <div class="error" id="error"><?php include '../partials/Admin/addCar.validate.php'; ?></div>

        <div>
            <label for="transmission">Transmission</label>
            <input type="text" id="transmission" name="transmission" placeholder="transmission">
        </div>

        <div>
            <label for="body_style">Body Style</label>
            <input type="text" id="body_style" name="body_style" placeholder="body style">

        </div>


        <div>
            <label for="seat_count">Number of Seats</label>
            <input type="number" id="seat_count" name="seat_count" placeholder="Number of Seats">
        </div>

        <div>
            <label for="engine_capacity">Engine Capacity</label>
            <input type="number" id="engine_capacity" name="engine_capacity" placeholder="engine capacity">
        </div>

        <div>
            <label for="fuel_consumption">Fuel Consumption</label>
            <input type="number" id="fuel_consumption" name="fuel_consumption" placeholder="Fuel Consumption">
        </div>
        <div>
            <label for="air_bag_count">Air Bag Count</label>
            <input type="number" id="air_bag_count" name="air_bag_count" placeholder="Air Bag Count">
        </div>
        <div>
            <input type="checkbox" id="ac" name="ac" value=1>
            <label for="ac">AC ?</label>
        </div>
        <br/>

        <div>
            <button type="submit" name="submit">Add Car Specs</button>
        </div>

    </form>

</div>


<script src="../../js/car.js"></script>
</body>
</html>