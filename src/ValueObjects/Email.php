<?php

namespace App\ValueObjects;

/**
* Class 
*/
final class Email implements ValueObjectsInterface
{
    /**
     * Email address
     *
     * @var string
     */
    private $value;

    public function __construct($value)
    {
        if( is_array($value) ){
            throw new \App\Exceptions\InvalidValueException('Invalid value email address.');
        }
        $value = strtolower((string)$value);
        if( !filter_var($value, FILTER_VALIDATE_EMAIL) || filter_var($value, FILTER_SANITIZE_EMAIL)!==$value ){
            throw new \App\Exceptions\InvalidValueException('Invalid value email address.');
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
        throw new \Exception('!!!');
    }
}