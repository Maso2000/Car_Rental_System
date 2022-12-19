<?php

class Admin extends Dbh
{
    private $admin_id;
    private $email;
    private $name;
    private $profile_image;
    private $ssn;

    //   private $password;

    // public function __construct($admin_id,$email,$password, $name,$ssn,$profile_image)
    // {
    //     $this->email = $email;
    //     $this->password = $password;
    //     $this->admin_id = $admin_id;
    //     $this->name = $name;
    //     $this->ssn = $ssn;
    //     $this->profile_image = $profile_image;

    // }

    public function getCount($tbl)
    {
        $query = "SELECT COUNT(*)" . " FROM $tbl;";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchColumn();

        // $admin_id = $_GET["admin_id"];

    }

    public function getRevenue()
    {
        $query = "SELECT SUM(amount_paid)" . " FROM reservation;";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $rev = $stmt->fetchColumn();
        if($rev ==null)
        return 0;
        else
        return $rev;

        // $admin_id = $_GET["admin_id"];

    }

    public function getAllReservations()
    {
        $query = "SELECT *" . " FROM reservation;";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();

        // $admin_id = $_GET["admin_id"];

    }


    public function getAllCustomers()
    {
        $query = "SELECT *" . " FROM customer;";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();

        // $admin_id = $_GET["admin_id"];

    }

    public function getAllCars()
    {
        $query = "SELECT *" . " FROM car;";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();

        // $admin_id = $_GET["admin_id"];

    }


    public function getAdminDetails($admin_id)
    {
        
        
        $query = "SELECT *" . " FROM admin WHERE admin_id = ?;";
        $stmt = $this->connect()->prepare($query);

        // $admin_id = $_GET["admin_id"];

        if (!$stmt->execute([$admin_id])) {
            $stmt = NULL;
           // echo "x ";
            // TODO :: headerLocation
            header("Location: ");
            exit();
        }
        if ($stmt->rowCount() == 1) {
            $addmin_db = $stmt->fetchAll();
            $this->email = $addmin_db[0]["email"];
            $this->name = $addmin_db[0]["name"];
            $this->ssn = $addmin_db[0]["ssn"];
            $this->profile_image = $addmin_db[0]["profile_image"];

            $this->admin_id = $admin_id;

            $stmt = NULL;
            

            //    echo "p = ";
            //    echo $this->ssn;

            //  $_GET[$admin_id] = $this ;

            return $this;
        }

        else {

            header("Location: ../Login/index.php?error=unAuth");
            session_destroy();
        }

        
    }

    public function removeCustomer($custId){

        
            $query = "DELETE FROM customer WHERE cust_id = ?";
            $stmt = $this->connect()->prepare($query);

            if (!$stmt->execute(array($custId))) {
                $stmt = NULL;
                header("Location: ../../resources/Admin/viewAllCustomers.php?error=stmtFailed");
                exit();
            }
            else{
            $stmt = NULL;
            header("Location: ../../resources/Admin/viewAllCustomers.php");
            exit();
            }
        
        
        
        exit();
    }


    public function removeReservation($resId){

        
        $query = "DELETE FROM reservation WHERE res_id = ?";
        $stmt = $this->connect()->prepare($query);

        if (!$stmt->execute(array($resId))) {
            $stmt = NULL;
            header("Location: ../../resources/Admin/viewAllReservation.php?error=stmtFailed");
            exit();
        }
        else{
        $stmt = NULL;
        header("Location: ../../resources/Admin/viewAllReservation.php");
        exit();
        }
    
    
    
    exit();
}

    public function getAdminId()
    {
        return $this->admin_id;
    }

    public function getAdminSSN()
    {
        return $this->ssn;
    }

    public function getAdminProfileImage()
    {
        return $this->profile_image;
    }

    public function getAdminName()
    {
        return $this->name;
    }

    public function getAdminEmail()
    {
        return $this->email;
    }

}
    
