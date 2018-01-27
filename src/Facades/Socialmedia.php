<?php

namespace Motwreen\Socialmedia\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class LaravelSocialmedia
 * @package Marvinosswald
 */
class Socialmedia extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'socialmedia';
    }
}