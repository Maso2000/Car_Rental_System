<?php


 include '../partials/Admin/addCar.validate.php';
session_start();

//TODO : ADD CAR MODIFY/DELETE BUTTON

if (!isset($_SESSION["admin_id"])) {
    //UNAUTHORIZED USER
    header("Location: ../../index.php?error=unAuth");
}



include(dirname(__FILE__) . '/../../classes/Models/Dbh.php');
include(dirname(__FILE__) . '/../../classes/Models/Admin.php');
include(dirname(__FILE__) . '/../../classes/Controllers/AdminController.php');

$controller = new AdminController();

$cars = $controller->getAllCars();

?>

<!DOCTYPE html>
<html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css">
    <link rel="stylesheet" href="https://rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/css/bootstrap-editable.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />




    <title>Admin | Cars</title>
    <!-- <link rel="stylesheet" href="../css/admin_style.css">-->
</head>
<header>
    <?php

    if (!isset($_SESSION["admin_id"])) {
        //UNAUTHORIZED USER
        header("Location: ../Login?error=unAuth");
        session_destroy();
    }
    ?>
</header>

<body>


    <div class="container">

    <a style="display: inline ;" href="index.php" style="color: whitesmoke;">
<p style="display: inline; color: primary;">Home</p>
<i class="fas fa-home" style="color: primary;"></i>
        </a>

        <h1 style="text-align: center;">Cars</h1>
     
      
        <a href="addCar.php" class="btn btn-primary">Add Car</a>


        <div id="toolbar">
            <select class="form-control">
                <option value="">Export Basic</option>
                <option value="all">Export All</option>
            </select>

        </div>


        <table id="table" data-toggle="table" data-search="true" data-filter-control="true" data-show-export="true" data-show-refresh="true" data-show-toggle="true" data-pagination="true" data-toolbar="#toolbar" class="table-responsive">
            <thead>
                <tr>
                    <th scope="col" data-field="plate_id<" data-filter-control="input" data-sortable="true">Plate ID</th>
                    <th scope="col" data-field="status" data-filter-control="input" data-sortable="true">status</th>
                    <th data-field="model" data-filter-control="input" data-sortable="false">Model</th>

                    <th scope="col" data-field="year" data-filter-control="input" data-sortable="true">Year</th>
                    <th scope="col" data-field="price" data-filter-control="input" data-sortable="true">Price</th>
                    <th scope="col" data-field="location" data-filter-control="input" data-sortable="true">Price</th>

                    <th scope="col" data-field="image_link" data-filter-control="input" data-sortable="false">Image Link</th>
                    <th scope="col">Car Specs</th>
                    <th scope="col">Modify</th>
                    <th scope="col">Delete</th>




                </tr>
            </thead>


            <tbody>




                <?php


                for ($i = 0; $i < count($cars); $i++) {

                    $s =
                        '<tr scope="row">' .
                        '<td>' . $cars[$i]['plate_id'] . '</td>' .
                        '<td>' . $cars[$i]['status'] . '</td>' .
                        '<td>' . $cars[$i]['model'] . '</td>' .
                        '<td>' . $cars[$i]['year'] . '</td>' .
                        '<td>' . $cars[$i]['price'] . '</td>' .
                        '<td>' . $cars[$i]['location'] . '</td>' .
                        '<td> <a href="'.$cars[$i]['image_link'] .'">Image Link</a> </td>' .
                        '<td> <a href="'.'modifyCarSpecs.php?plate_id='.$cars[$i]['plate_id'].'">View Car Specs</a> </td>' .

                        '<td>' .
                       '<form method="GET" action="modifyCar.php">
                       <input type="hidden" id="plate_id" name="plate_id" value="'.$cars[$i]['plate_id'].'">
           <button type="submit" id="submit" name="submit"class="btn btn-warning">Modify</button>
           </form>'
                        . '</td>' .

                        '<td>' .
                        '<form method="POST" action="../../includes/Admin/deleteCar.inc.php">
                       <input type="hidden" id="plate_id" name="plate_id" value="' .$cars[$i]['plate_id'].'">
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



    <script language="JavaScript" type="text/javascript">
        var $table = $('#table');
        $(function() {
            $('#toolbar').find('select').change(function() {
                $table.bootstrapTable('refreshOptions', {
                    exportDataType: $(this).val()
                });
            });
        })

        var trBoldBlue = $("table");


        $(trBoldBlue).on("click", "tr", function() {
            $(this).toggleClass("bold-blue");
        });
    </script>

</body>

</html>