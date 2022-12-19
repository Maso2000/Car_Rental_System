<?php

// TODO: CAR MODEL 
class Car extends Dbh
{

    private function carExist($plateId)
    {
        $query = "SELECT *" . " FROM car WHERE plate_id = ?;";
        $stmt = $this->connect()->prepare($query);

        // Query Failed
        if (!$stmt->execute([$plateId])) {
            $stmt = NULL;
            header("Location: ../../index.php?error=stmtFailed");
            exit();
        }
        // Doesn't Exist
        if ($stmt->rowCount() == 0) {
            $stmt = NULL;
            //header("Location: ../../index.php?error=wrongUsernameOrPassword");
            return False;
        }
        return $stmt->fetchAll();
    }

    protected function insertCar($plateId, $model, $price, $year, $status, $car_image, $location)
    {
        if (!$this->carExist($plateId)) {
            $query = "INSERT INTO" . " car (plate_id, model, price , year,status,image_link , location)
                    VALUES (?, ?, ?,?, ?, ?,?);";
            $stmt = $this->connect()->prepare($query);

            if (!$stmt->execute(array($plateId, $model, $price, $year, $status, $car_image, $location))) {
                $stmt = NULL;
                header("Location: ../resources/Admin/addCar.php?error=stmtFailed");
                exit();
            }
            $stmt = NULL;

        } else {

            header("Location: ../resources/Admin/addCar.php?error=carAlreadyExist");
            exit();
        }
    }


    protected function editCar($plateId, $model, $price, $year, $status, $car_image, $location)
    {
        if ($this->carExist($plateId)) {
            $query = "
            UPDATE car
             SET   model = ?, price =?, `year` = ?,`status` =?,`image_link` = ? , `location` = ?
                    WHERE plate_id = ?;";
            $stmt = $this->connect()->prepare($query);

            if (!$stmt->execute(array($model, $price, $year, $status, $car_image, $location, $plateId))) {
                $stmt = NULL;
                header("Location: ../resources/Admin/modifyCar.php?error=stmtFailed");
                exit();
            }
            $stmt = NULL;

        } else {

            header("Location: ../resources/Admin/modifyCar.php?error=carNotExist");
            exit();
        }
    }


    protected function deleteCar($plateId)
    {
        if ($this->carExist($plateId)) {
            $query = "DELETE FROM car WHERE plate_id = ?";
            $stmt = $this->connect()->prepare($query);

            if (!$stmt->execute(array($plateId))) {
                $stmt = NULL;
                header("Location: ../../resources/Admin/viewAllCars.php?error=stmtFailed");
            } else {
                $stmt = NULL;
                header("Location: ../../resources/Admin/viewAllCars.php");
            }
            exit();
        } else {
            header("Location: ../../resources/Admin/viewAllCars.php?error=carNotExist");
        }
        exit();
    }

    protected function getCar($plateId)
    {
        $carExist = $this->carExist($plateId);
        if ($carExist === False) {
            header("Location: ../../resources/Admin/addCar.php?error=carAlreadyExists");
            exit();
        }

        // Starting Session
        //    // $_SESSION["id"] = $userExist[0]["cust_id"];
        //     $_SESSION["email"] = $userExist[0]["email"];
        //     if($isAdmin){
        //         $_SESSION["admin_id"] = $userExist[0]["admin_id"];
        // echo  $_SESSION["admin_id"];
        header("Location: ../../resources/Admin/car.php");

        // TODO :: Location Header
        //header("Location: ");

        exit();
    }

    protected function insertSpec($plate_id, $transmission, $body_style, $ac, $seats_count, $engine_capacity, $fuel_consumption, $air_bags_count)
    {
        $query = "INSERT INTO" . " specs (plate_id, transmission, body_style, AC, seats_count, engine_capacity, fuel_consumption, air_bags_count)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = $this->connect()->prepare($query);
        if (!$stmt->execute(array($plate_id, $transmission, $body_style, $ac, $seats_count, $engine_capacity, $fuel_consumption, $air_bags_count))) {
            header("Location: ../../resources/Admin/addSpecs.php?error=stmtFailed");
        } else {
            header("Location: ../../resources/Admin/viewAllCars.php?error=none");
        }
        $stmt = NULL;
        exit();
    }


    protected function editSpec($plate_id, $transmission, $body_style, $ac, $seats_count, $engine_capacity, $fuel_consumption, $air_bags_count)
    {
        $specs = $this->getSpecs($plate_id);
        if ($specs) {
            $query = "UPDATE  specs "
                . "SET  transmission = ?, body_style=?, AC=?, seats_count=?, engine_capacity=?,fuel_consumption=?, air_bags_count=? "
                . "WHERE plate_id = ?;";

            $stmt = $this->connect()->prepare($query);
            if (!$stmt->execute(array($transmission, $body_style, $ac, $seats_count, $engine_capacity, $fuel_consumption, $air_bags_count, $plate_id))) {
                header("Location: ../../resources/Admin/viewAllCars.php?specsModified=failed");
            } else {
                header("Location: ../../resources/Admin/viewAllCars.php?specsModified=true");
            }
            $stmt = NULL;
        } else {
            $this->insertSpec($plate_id, $transmission, $body_style, $ac, $seats_count, $engine_capacity, $fuel_consumption, $air_bags_count);
        }
        exit();
    }

    protected function getSpecs($plate_id)
    {
        $query = "SELECT *" . " FROM specs 
                  WHERE plate_id =?;";
        $stmt = $this->connect()->prepare($query);
        /* Query Failed*/
        if (!$stmt->execute(array($plate_id))) {
            $stmt = NULL;
            header("Location: ../../resources/Admin/modifyCarSpecs.php?error=stmtFailed");
            exit();
        }
        if ($stmt->rowCount() == 0) {
            $stmt = NULL;
            return False;
        } else {
            return $stmt->fetchAll();
        }
        // header("Location: ../resources/Admin/modifyCarSpecs.php?error=none");
    }
}
