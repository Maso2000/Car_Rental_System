<?php


class AdminController extends Admin
{
    private $admin;


    public function getReservationCount()
    {
        return $this->getCount('reservation');
    }

    public function getCustomerCount()
    {
        return $this->getCount('customer');
    }

    public function getCarsCount()
    {
        return $this->getCount('car');
    }


    public function getRentRevenue()
    {
        return $this->getRevenue();
    }

    public function getAdmin($admin_id)
    {
        $this->admin = new Admin();
        $this->admin->getAdminDetails($admin_id);

        //echo $admin->getAdminId();

        if ($this->admin == false) {
            return false;
        } else {

            // echo $admin->ssn;

            return $this->admin;
        }
    }

}