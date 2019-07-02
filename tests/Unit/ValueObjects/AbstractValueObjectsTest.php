<?php

namespace Tests\Unit\ValueObjects;

use PHPUnit\Framework\TestCase;

/**
* Class AbstractValueObjectsTest test.
*/
abstract class AbstractValueObjectsTest extends TestCase
{

    protected $className;

    /**
     * @dataProvider dataCreateGoodValue
     * 
     * Testing the creation of an object
     *
     * @return void
     */
    public function testCreateGoodValue($expectedValue, $value)
    {
        $valueObject = new $this->className($value);
        $this->assertSame((string)$valueObject, $expectedValue);
        $this->assertSame((string)new $this->className($valueObject), $expectedValue);
    }

    /**
     * @dataProvider dataCreateWrongValue
     * 
     * Testing the creation of an object
     *
     * @return void
     */
    public function testCreateWrongValue($value)
    {
        $this->expectException(\App\Exceptions\InvalidValueException::class);
        new $this->className($value);
    }

    abstract public function dataCreateGoodValue(): array;
    abstract public function dataCreateWrongValue(): array;
}