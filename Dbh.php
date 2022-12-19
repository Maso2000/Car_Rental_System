<?php

class Dbh
{
    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbName = "car_rental_system";

    protected function connect()
    {
        
        try {
           
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbName;
            $dbh = new PDO($dsn, $this->user, $this->pwd);
            

            $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $dbh;
        } catch (PDOException $e) {
            
            print "Error:" . $e->getMessage() . '<br/>';
            die();
        }
    }
}
