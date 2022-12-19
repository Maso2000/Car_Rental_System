<?php

class Register extends Dbh
{
    /*protected function availableUsername($username)
    {
        $query = "SELECT *" . " FROM customer WHERE username = ?;";
        $stmt = $this->connect()->prepare($query);

        if (!$stmt->execute($username)) {
            $stmt = NULL;
            header("Location: ../../index.php?error=stmtFailed");
            exit();
        }
        if ($stmt->rowCount() > 0) {
            $stmt = NULL;
            return False;
        } else {
            $stmt = NULL;
            return True;
        }
    }
*/
    protected function availableEmail($email)
    {
        $query = "SELECT *" . " FROM customer WHERE email = ?;";
        $stmt = $this->connect()->prepare($query);

        if (!$stmt->execute([$email])) {
            $stmt = NULL;
            header("Location: ../../register.php?error=stmtFailed");
            exit();
        }
        if ($stmt->rowCount() > 0) {
            $stmt = NULL;
            return False;
        } else {
            $stmt = NULL;
            return True;
        }
    }

    protected function availableSSN($ssn)
    {
        $query = "SELECT *" . " FROM customer WHERE ssn = ?;";
        $stmt = $this->connect()->prepare($query);

        if (!$stmt->execute([$ssn])) {
            $stmt = NULL;
            header("Location: ../../register.php?error=stmtFailed");
            exit();
        }
        if ($stmt->rowCount() > 0) {
            $stmt = NULL;
            return False;
        } else {
            $stmt = NULL;
            return True;
        }
    }

    protected function createUser($email, $name, $password, $ssn, $address, $phone, $profileImage)
    {
        $query = "INSERT INTO" . " customer (email, name, password , ssn,address,phone,profile_image)
                    VALUES (?, ?, ?,?, ?, ?,?);";
        $stmt = $this->connect()->prepare($query);
        $hashedPass = password_hash($password, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($email, $name, $hashedPass, $ssn, $address, $phone, $profileImage))) {
            $stmt = NULL;
            header("Location: ../resources/Login/register.php?error=stmtFailed");
            exit();
        }
        $stmt = NULL;
        // $_SESSION['cust_name'] = $_cus
        header("Location: ../resources/Customer/index.php");

    }
}