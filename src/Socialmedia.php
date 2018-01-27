<?php
namespace Motwreen\Socialmedia;
use Motwreen\Socialmedia\Contracts\DriverInterface as Driver;
use Motwreen\Socialmedia\Drivers\Facebook\Driver as FacebookDriver;

/**
 * Class Socialmedia
 * @package Motwreen\Socialmedia
 */
class Socialmedia
{
    /**
     * Detector Drivers available and its shortcuts.
     * @var array
     */
    protected $drivers = [
        'twitter' => 'Motwreen\Socialmedia\Drivers\Twitter\Driver',
        'facebook' => 'Motwreen\Socialmedia\Drivers\Facebook\Driver',
        'pinterest' => 'Motwreen\Socialmedia\Drivers\Pinterest\Driver'
    ];

    /**
     * @var array
     */
    protected $availableDrivers = [];

    /**
     * Socialmedia constructor.
     */
    public function __construct()
    {
        foreach ($this->drivers as $short => $driver) {
            $this->availableDrivers[$short] = new $driver();
        }
    }

    /**
     * @param $params
     * @param array $drivers
     * @return array
     */
    public function post($access_token,$params,$drivers=[])
    {
        return $this->execWithDrivers($drivers,'post',$params,$access_token);
    }

    /**
     * @param $id
     * @param array $drivers
     * @return array
     */
    public function delete($id,$drivers=[])
    {
        return $this->execWithDrivers($drivers,'delete',$id);
    }

    /**
     * @param array $drivers
     * @param $method
     * @param $params
     * @return array
     */
    private function execWithDrivers($drivers=[],$method,$params,$access_token)
    {
        $res = [];
        if (empty($drivers)){
            foreach ($this->availableDrivers as $short => $driver){
                $res[$short] = $driver->{$method}($params,$access_token);
            }
        }else{
            foreach ($drivers as $short){
                $res[$short] = $this->availableDrivers[$short]->{$method}($params);
            }
        }
        return $res;
    }
}