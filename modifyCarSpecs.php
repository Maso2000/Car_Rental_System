<?php
    include '../../includes/Admin/modifyCarSpecs.inc.php';
 
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
    <form id="register_form" class="form_register" method="POST" action="../../includes/Admin/modifyCarSpecs.inc.php"
          onsubmit="return validateSpecs()">
        <h2>Modify Car Specs of Plate ID : <?php echo $_GET['plate_id']; ?></h2>
        <div class="error" id="error"><?php include '../partials/Admin/addCar.validate.php'; ?></div>
        <input type="hidden" id="plate_id" name="plate_id" value="<?php echo $plateId; ?>">

        <div>
            <label for="transmission">Transmission</label>
            <input type="text" id="transmission" name="transmission" value="<?php echo $transmission; ?>">
        </div>

        <div>
            <label for="body_style">Body Style</label>
            <input type="text" id="body_style" name="body_style" value="<?php echo $body_style; ?>">

        </div>


        <div>
            <label for="seat_count">Number of Seats</label>
            <input type="number" id="seats_count" name="seats_count"value="<?php echo $seats_count; ?>">
        </div>

        <div>
            <label for="engine_capacity">Engine Capacity</label>
            <input type="number" id="engine_capacity" name="engine_capacity" value="<?php echo $engine_capacity; ?>">
        </div>

        <div>
            <label for="fuel_consumption">Fuel Consumption</label>
            <input type="number" id="fuel_consumption" name="fuel_consumption"value="<?php echo $fuel_consumption; ?>">
        </div>
        <div>
            <label for="air_bag_count">Air Bag Count</label>
            <input type="number" id="air_bags_count" name="air_bags_count"value="<?php echo $air_bags_count; ?>">
        </div>
        <div>
            <input type="checkbox" id="AC" name="AC" value="<?php echo $AC; ?>" checked = "<?php echo $AC; ?>">
            <label for="ac">AC ?</label>
        </div>
        <br/>

        <div>
            <button type="submit" name="submit">Modify Car Specs</button>
        </div>

    </form>

</div>


<script src="../../js/car.js"></script>
</body>
</html>