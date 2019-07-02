<?php

namespace Tests\Unit\ValueObjects;

use PHPUnit\Framework\TestCase;
use App\ValueObjects\Email;

/**
* Class 
*/
class EmailTest extends TestCase
{
    /**
     * @dataProvider dataCreateGoodValue
     * 
     * Testing the creation of an object
     *
     * @return void
     */
    public function testCreateGoodValue($expectedValue, $value)
    {
        $valueObject = new Email($value);
        $this->assertSame((string)$valueObject, $expectedValue);
        $this->assertSame((string)new Email($valueObject), $expectedValue);
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
        new Email($value);
    }

    /**
     * @dataProvider dataCreateGoodValue
     * 
     * Testing the is equal to object.
     *
     * @return void
     */
    public function testIsEqualToGoodValue($valueForObject1, $valueForObject2)
    {
        $valueObject = new Email($valueForObject1);
        $this->assertTrue($valueObject->isEqualTo(new Email($valueForObject2)));
    }

    /**
     * @dataProvider dataCreateGoodValue
     * 
     * Testing the is not equal to object.
     *
     * @return void
     */
    public function testIsNotEqualToGoodValue($valueForObject1, $valueForObject2)
    {
        $valueObject = new Email($valueForObject1);
        $this->assertFalse($valueObject->isEqualTo(new Email('prefix_'.$valueForObject2)));
    }

    public function dataCreateGoodValue(): array
    {
        return [
            ['test@gm.pl', 'test@gm.pl'],
            ['test@o2.pl', 'test@o2.pl'],
            ['test@o2.pl', 'TEST@O2.PL'],
            ['a@gm.pl', 'A@gM.Pl'],
            ['good.email@gmail.com', new class(){public function __toString(){return 'good.email@gmail.com';}}],
        ];
    }

    public function dataCreateWrongValue(): array
    {
        return [
            ['testgm.pl'],
            [false],
            ['a'],
            ['6565'],
            ['A@b@c@example.com'],
            ['a"b(c)d,e:f;gi[j\k]l@example.com'],
            ['john..doe@example.com'],
            [12345],
            [12.12],
            [new class(){public function __toString(){return 'abc';}}],
            [['bad.email@gmail.com']],
        ];
    }
}