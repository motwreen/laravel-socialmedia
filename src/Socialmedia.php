<?php
namespace Motwreen\Socialmedia;

class Socialmedia
{
    private $socialDriver;
    private $config;

    private $drivers = [
        'twitter' => 'Motwreen\Socialmedia\Drivers\Twitter\Driver',
        'facebook' => 'Motwreen\Socialmedia\Drivers\Facebook\Driver',
        'pinterest' => 'Motwreen\Socialmedia\Drivers\Pinterest\Driver'
    ];


    public function driver($driver)
    {
        if(!in_array($driver,array_keys($this->drivers))){
            throw new \RuntimeException('Not A valid Driver');
        }
        $this->socialDriver = new $this->drivers[$driver]();
        return $this;
    }

    public function setConfig($config)
    {
        $this->config = $config;
        $this->socialDriver = new $this->socialDriver();
        $this->socialDriver->buildConfig($config);
        return $this;
    }

    public function post($params)
    {
        return $this->socialDriver->post($this->config,$params);
    }


}