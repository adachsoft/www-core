<?php

namespace App\ValueObjects;

/**
* Class 
*/
final class Login implements ValueObjectsInterface
{
    private $value;

    public function __construct($value)
    {
        if(!$this->isStringCompatibility($value)){
            throw new \App\Exceptions\InvalidValueException('Invalid value.');
        }
        if( is_object($value) ){
            $value = (string)$value;
        }
        if( !preg_match("/^[A-Za-z0-9_\.\-]+$/i", $value) ){
            throw new \App\Exceptions\InvalidValueException('Invalid value, login can only contain uppercase, lowercase letters, numbers and special characters: _.-');
        }
        $this->value = $value;
    }

    public function __toString(): string
    {
        return (string)$this->value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function isEqualTo(ValueObjectsInterface $valueObject): bool
    {
        if( $valueObject instanceof self ){
            return $this->value === $valueObject->getValue();
        }
        throw new \App\Exceptions\InvalidValueException('Wrong type of object to compare.');
    }

    private function isStringCompatibility($value): bool
    {
        return is_string($value) || (is_object($value) && method_exists($value, '__toString'));
    }
}