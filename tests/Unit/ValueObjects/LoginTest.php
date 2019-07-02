<?php

namespace Tests\Unit\ValueObjects;

use App\ValueObjects\Login;

/**
* Class LoginTest test.
*/
class LoginTest extends AbstractValueObjectsTest
{
    
    protected $className = Login::class;

    public function dataCreateGoodValue(): array
    {
        return [
            ['arek', 'arek'],
            ['login', 'login'],
            ['good_login', 'good_login'],
            ['Abc.login', 'Abc.login'],
            ['good_login_from_object', new class(){public function __toString(){return 'good_login_from_object';}}],
        ];
    }

    public function dataCreateWrongValue(): array
    {
        return [
            [false],
            [12345],
            [12.12],
            [['login_wrong']],
            ['@!$@#%#$'],
            ['  '],
            [' '],
            [''],
            ['abc qwe'],
            ['abc '],
            [' qwe'],
            ["DSfds\rgf"],
        ];
    }
}