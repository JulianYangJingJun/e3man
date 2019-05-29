<?php
namespace e3man\e3man\Facades;

use Illuminate\Support\Facades\Facade;

class Pat extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'e3man'; 
    }
}