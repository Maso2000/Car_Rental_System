<?php


class CarController extends Car
{
    private $plateId;
    private $model;
    private $price;
    private $year;
    private $status;
    private $car_image;
    private $location;


    public function __construct($plateId, $model, $price, $year, $status, $car_image, $location)
    {
        $this->plateId = $plateId;
        $this->model = $model;
        $this->price = $price;
        $this->year = $year;
        $this->status = $status;
        $this->car_image = $car_image;
        $this->location = $location;

    }


    public function addCar()
    {
        $this->insertCar($this->plateId, $this->model, $this->price, $this->year, $this->status, $this->car_image, $this->location);
    }

    public function modifyCar()
    {
        $this->editCar($this->plateId, $this->model, $this->price, $this->year, $this->status, $this->car_image, $this->location);
    }

    public function removeCar($plateId)
    {
        $this->deleteCar($plateId);
    }

    public static function addSpec($plate_id, $transmission, $body_style, $ac, $seats_count, $engine_capacity, $fuel_consumption, $air_bags_count)
    {
        (new Car)->insertSpec($plate_id, $transmission, $body_style, $ac, $seats_count, $engine_capacity, $fuel_consumption, $air_bags_count);
    }

    public static function modifySpec($plate_id, $transmission, $body_style, $ac, $seats_count, $engine_capacity, $fuel_consumption, $air_bags_count)
    {
        (new Car)->editSpec($plate_id, $transmission, $body_style, $ac, $seats_count, $engine_capacity, $fuel_consumption, $air_bags_count);
    }

    public static function getCarSpecs($plate_id)
    {
        if ((new Car)->getSpecs($plate_id)) {
            return (new Car)->getSpecs($plate_id)[0];
        } else
            return false;

    }
}