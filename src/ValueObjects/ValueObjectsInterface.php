<?php

namespace App\ValueObjects;

/**
* Interface 
*/
interface ValueObjectsInterface 
{
    public function isEqualTo(ValueObjectsInterface $valueObject): bool;
}