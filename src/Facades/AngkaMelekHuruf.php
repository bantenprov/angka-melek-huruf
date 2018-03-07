<?php

namespace Bantenprov\AngkaMelekHuruf\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The AngkaMelekHuruf facade.
 *
 * @package Bantenprov\AngkaMelekHuruf
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class AngkaMelekHurufFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'angka-melek-huruf';
    }
}
