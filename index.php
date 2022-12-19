<?php
session_start();

include "../../includes/Admin/admin.inc.php";

//echo $reservationCount;
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


  
    <title>Admin</title>
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

    <a style="float: right;" href="../../includes/logout.inc.php" style="color: whitesmoke;">
        <p style="display: inline;">Logout</p>
        <i class="fas fa-sign-out-alt" style="color: whitesmoke;"></i>
    </a>
    <h1>

        <a href="" class="typewrite" data-period="2000" data-type='[ "Welcome , <?php echo $admin->getAdminName(); ?>.", "Car Rent."]'>
            <span class="wrap"></span>
        </a>
    </h1>

    <section class="wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
        <div class="container">
            <div class="row">

                <!-- counter -->
                <div class="col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated" data-wow-duration="300ms" style="visibility: visible; animation-duration: 300ms; animation-name: fadeInUp;"><i class="fas fa-calendar-check medium-icon"></i> <span id="anim-number-pizza" class="counter-number"></span> <span class="timer counter alt-font appear" data-to="<?php echo $reservationCount; ?>" data-speed="7000"><?php echo $reservationCount; ?></span>
                    <a href="viewAllReservation.php" style="color: whitesmoke;">
                        <p class="counter-title">Reservations</p>
                    </a>
                </div> <!-- end counter -->


                <!-- counter -->
                <div class="col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated" data-wow-duration="600ms" style="visibility: visible; animation-duration: 600ms; animation-name: fadeInUp;">
                    <i class="fas fa-users medium-icon"></i> <span class="timer counter alt-font appear" data-to="<?php echo $customerCount; ?>" data-speed="7000"><?php echo $customerCount; ?></span>
                    <a href="viewAllCustomers.php" style="color: whitesmoke;">

                        <span class="counter-title">Customers</span>
                    </a>

                </div> <!-- end counter -->

                <!-- counter -->
                <div class="col-md-3 col-sm-6 bottom-margin-small text-center counter-section wow fadeInUp xs-margin-bottom-ten animated" data-wow-duration="900ms" style="visibility: visible; animation-duration: 900ms; animation-name: fadeInUp;">
                    <i class="fas fa-car medium-icon"></i> <span class="timer counter alt-font appear" data-to="<?php echo $CarsCount; ?>" data-speed="7000"><?php echo $CarsCount; ?></span>

                    <a href="viewAllCars.php" style="color: whitesmoke;">

                        <span class="counter-title">Cars</span>
                    </a>

                </div> <!-- end counter -->

                <!-- counter -->
                <div class="col-md-3 col-sm-6 text-center counter-section wow fadeInUp animated" data-wow-duration="1200ms" style="visibility: visible; animation-duration: 1200ms; animation-name: fadeInUp;"><i class="fas fa-money-check-alt medium-icon"></i> <span class="timer counter alt-font appear" data-to="<?php echo $revenue; ?>" data-speed="7000"><?php echo $revenue; ?></span>

                    <span class="counter-title">Revenue</span>
                </div> <!-- end counter -->
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <script src="../js/admin.js"></script>
  
</body>

</html>