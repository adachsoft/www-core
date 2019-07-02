<?php

namespace App\ValueObjects;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
* Class 
*/
final class Password implements ValueObjectsInterface
{
    public function __construct(string $password)
    {
        
    }

    public function isEqualTo(ValueObjectsInterface $valueObject): bool
    {
        return false;
    }
}
