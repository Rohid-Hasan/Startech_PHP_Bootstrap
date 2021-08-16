<?php

class Laptop extends Product
{
    private $laptopId;
    private $processor;
    private $ram;
    private $display;
    private $battery;
    private $storage;
    private $graphics;

    function __construct($laptopId,$processor, $ram, $display, $storage, $battery, $graphics)
    {
        $this->laptopId = $laptopId;
        $this->processor = $processor;
        $this->ram = $ram;
        $this->display = $display;
        $this->storage = $storage;
        $this->battery = $battery;
        $this->graphics = $graphics;
    }

    function get_laptopId(){
        return $this->laptopId;
    }

    function set_laptopId($laptopId){
        $this->laptopId =$laptopId;
    }

    function get_processor($processor)
    {
        $this->processor = $processor;
    }

    function get_ram($ram)
    {
        $this->ram = $ram;
    }

    function get_display($display)
    {
        $this->display = $display;
    }

    function get_storage($storage)
    {
        $this->storage = $storage;
    }

    function get_battery($battery)
    {
        $this->battery = $battery;
    }
    function get_graphics($graphics)
    {
        $this->graphics = $graphics;
    }








    function set_processor()
    {
        return $this->processor;
    }

    function set_ram()
    {
        return $this->ram;
    }

    function set_display()
    {
        return $this->display;
    }

    function set_storage()
    {
        return $this->storage;
    }

    function set_battery()
    {
        return $this->battery;
    }
    function set_graphics()
    {
        return $this->graphics;
    }
}
