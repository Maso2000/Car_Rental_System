<?php


class LoginController extends Login
{
    private $email;
    private $password;
    private $isAdmin;

    public function __construct($email, $password, $isAdmin)
    {
        $this->email = $email;
        $this->password = $password;
        $this->isAdmin = $isAdmin;
    }

    public function login()
    {
        $this->getUser($this->email, $this->password, $this->isAdmin);
    }
}