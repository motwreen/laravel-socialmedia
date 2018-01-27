<?php
namespace Motwreen\Socialmedia\Contracts;

interface DriverInterface
{
    /**
     * @param $params
     * @return mixed
     */
    public function post($params);
}