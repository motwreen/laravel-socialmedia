<?php
namespace Motwreen\Socialmedia\Contracts;

/**
 * Class DriverInterface
 * @package Marvinosswald\Socialmedia\Contracts
 */
interface DriverInterface
{
    /**
     * @param $params
     * @return mixed
     */
    public function post($params);
}