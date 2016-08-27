<?php

namespace Brazanation\Documents\Tests\StateRegistration;

use Brazanation\Documents\StateRegistration;
use Brazanation\Documents\StateRegistration\DistritoFederal as DF;
use Brazanation\Documents\Tests\DocumentTestCase;

class DistritoFederal extends DocumentTestCase
{

    public function createDocument($number)
    {
        return new StateRegistration($number, new DF());
    }

    public function provideValidNumbers()
    {
        return [
            ['0714880000168'],
            ['07.685814.001-20'],
            ['07.791418.001-93'],
            ['07.568555.001-15']
        ];
    }

    public function provideValidNumbersAndExpectedFormat()
    {
        return [
            ['0756855500115', '07.568555.001-15'],
            ['0779141800193', '07.791418.001-93'],
            ['0768581400120', '07.685814.001-20']
        ];
    }

    public function provideEmptyData()
    {
        return [
            [DF::LABEL, ''],
            [DF::LABEL, null],
            [DF::LABEL, 0],
        ];
    }

    public function provideInvalidNumber()
    {
        return [
            [DF::LABEL, 1],
            [DF::LABEL, '0756855600125'],
        ];
    }
}
