<?php


class RegisterController extends Register
{
    private $email;
    private $name;
    private $password;
    private $ssn;
    private $address;
    private $phone;
    private $profileImage;


    public function __construct($email, $name, $password, $ssn, $address, $phone, $profileImage)
    {
        $this->email = $email;
        $this->name = $name;
        $this->password = $password;

        $this->ssn = $ssn;
        $this->address = $address;
        $this->phone = $phone;
        $this->profileImage = $profileImage;


    }

    public function register()
    {
        if ($this->takenEmail($this->email) == false) {
            header("Location: ../register.php?error=takenEmail");
            exit();
        }
        if ($this->availableSSN($this->ssn) == false) {
            header("Location: ../index.php?error=takenSSN");
            exit();
        }
        $this->createUser($this->email, $this->name, $this->password, $this->ssn
            , $this->address, $this->phone, $this->profileImage);

    }

    private function emptyInput()
    {
        if (empty($this->email) || empty($this->name) || empty($this->password)) {
            return false;
        } else {
            return true;
        }
    }

    private function invalidUsername($name)
    {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    private function invalidEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    /*private function takenname($name)
    {
        if (!$this->availablename($name)) {
            $result = True;
        } else {
            $result = False;
        }
        return $result;
    }
*/
    private function takenEmail($email)
    {
        return $this->availableEmail($email);
    }
}

