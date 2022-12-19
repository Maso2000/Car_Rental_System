<?php

session_start();

//TODO : DELETE RESERVATION BUTTON


if (!isset($_SESSION["admin_id"])) {
    //UNAUTHORIZED USER
    header("Location: ../../index.php?error=unAuth");
    session_destroy();
}


include(dirname(__FILE__) . '/../../classes/Models/Dbh.php');
include(dirname(__FILE__) . '/../../classes/Models/Admin.php');
include(dirname(__FILE__) . '/../../classes/Controllers/AdminController.php');

$controller = new AdminController();

$res = $controller->getAllReservations();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css">
    <link rel="stylesheet"
          href="https://rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/css/bootstrap-editable.css"/>

          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


    <title>Admin | Reservations</title>
    <!-- <link rel="stylesheet" href="../css/admin_style.css">-->
</head>
<header>

</header>

<body>

<div class="container">
<a style="display: inline ;" href="index.php" style="color: whitesmoke;">
<p style="display: inline; color: primary;">Home</p>
<i class="fas fa-home" style="color: primary;"></i>
        </a>
    <h1 style="text-align: center;">Reservations</h1>


    <div id="toolbar">
        <select class="form-control">
            <option value="">Export Basic</option>
            <option value="all">Export All</option>
        </select>
    </div>

    <table id="table"
           data-toggle="table"
           data-search="true"
           data-filter-control="true"
           data-show-export="true"
           data-show-refresh="true"
           data-show-toggle="true"
           data-pagination="true"

           data-toolbar="#toolbar"
           class="table-responsive">
        <thead>
        <tr>
            <th data-field="res_id<" data-filter-control="input" data-sortable="true">Reservation ID</th>
            <th data-field="plate_id" data-filter-control="input" data-sortable="true">Plate ID</th>
            <th data-field="cust_id" data-filter-control="input" data-sortable="true">Customer ID</th>
            <th data-field="res_date" data-filter-control="input" data-sortable="true">Reservation Date</th>

            <th data-field="return_date" data-filter-control="input" data-sortable="true">Return Date</th>
            <th data-field="location<" data-filter-control="input" data-sortable="true">Location</th>
            <th data-field="amount_paid" data-filter-control="input" data-sortable="true">Amount Paid</th>
            <th scope="col">Delete</th>


        </tr>
        </thead>
        <tbody>
        <?php
        for ($i = 0; $i < count($res); $i++) {

            $s =
                '<tr>' .
                '<td>' . $res[$i]['res_id'] . '</td>' .
                '<td>' . $res[$i]['plate_id'] . '</td>' .
                '<td>' . $res[$i]['cust_id'] . '</td>' .
                '<td>' . $res[$i]['res_date'] . '</td>' .
                '<td>' . $res[$i]['return_date'] . '</td>' .
                '<td>' . $res[$i]['location'] . '</td>' .
                '<td>' . $res[$i]['amount_paid'] . '</td>' .
                '<td>' .
                '<form method="POST" action="../../includes/Admin/deleteReservation.inc.php">
                <input type="hidden" id="res_id" name="res_id" value="' .$res[$i]['res_id'].'">
    <button type="submit" id="submit" name="submit"class="btn btn-danger">Delete</button>
    </form>'
                 . '</td>' .
                '</tr>';
            echo $s;

        }
        ?>

        </tbody>
    </table>
</div>

<script language="JavaScript" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.0/bootstrap-table.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/editable/bootstrap-table-editable.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/export/bootstrap-table-export.js"></script>

    <script src="https://rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/filter-control/bootstrap-table-filter-control.js"></script>



<script>
    var $table = $('#table');
    $(function () {
        $('#toolbar').find('select').change(function () {
            $table.bootstrapTable('refreshOptions', {
                exportDataType: $(this).val()
            });
        });
    })

    var trBoldBlue = $("table");


    $(trBoldBlue).on("click", "tr", function () {
        $(this).toggleClass("bold-blue");
    });
</script>




</body>

