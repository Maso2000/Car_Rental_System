<?php

session_start();

//TODO : DELETE CUSTOMER BUTTON


if (!isset($_SESSION["admin_id"])) {
    //UNAUTHORIZED USER
    header("Location: ../../index.php?error=unAuth");
    session_destroy();
}


include(dirname(__FILE__) . '/../../classes/Models/Dbh.php');
include(dirname(__FILE__) . '/../../classes/Models/Admin.php');
include(dirname(__FILE__) . '/../../classes/Controllers/AdminController.php');

$controller = new AdminController();

$customers = $controller->getAllCustomers();

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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


    <title>Admin | Customers</title>
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
    <h1 style="text-align: center;">Customers</h1>


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
            <th data-field="customer_id<" data-filter-control="input" data-sortable="true">Customer ID</th>
            <th data-field="name" data-filter-control="input" data-sortable="true">Name</th>
            <th data-field="email" data-filter-control="input" data-sortable="false">Email</th>

            <th data-field="ssn" data-filter-control="input" data-sortable="true">SSN</th>
            <th data-field="phone" data-filter-control="input" data-sortable="false">Phone</th>

            <th data-field="address" data-filter-control="input" data-sortable="false">Address</th>

            <th data-field="profile_image" data-sortable="false">Profile Image</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        for ($i = 0; $i < count($customers); $i++) {

            $s =
                '<tr>' .
                '<td>' . $customers[$i]['cust_id'] . '</td>' .
                '<td>' . $customers[$i]['name'] . '</td>' .
                '<td>' . $customers[$i]['email'] . '</td>' .
                '<td>' . $customers[$i]['ssn'] . '</td>' .
                '<td>' . $customers[$i]['phone'] . '</td>' .
                '<td>' . $customers[$i]['address'] . '</td>' .
                '<td>' . $customers[$i]['profile_image'] . '</td>' .
                '<td>' .
                '<form method="POST" action="../../includes/Admin/deleteCustomer.inc.php">
                       <input type="hidden" id="cust_id" name="cust_id" value="' . $customers[$i]['cust_id'] . '">
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


<script language="JavaScript" type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
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

