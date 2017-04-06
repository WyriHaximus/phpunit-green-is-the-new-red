<?php

namespace WyriHaximus\PHPUnit\Tests\GreenIsTheNewRed;

use PHPUnit\Framework\TestCase;

final class GreenIsTheNewRedResultPrinterTest extends TestCase
{
    public function provideSchrodingersCat()
    {
        for ($i = 0; $i < 1337; $i++) {
            yield [mt_rand(0, 5) === 1];
        }
    }

    /**
     * @dataProvider provideSchrodingersCat
     * @param $bool
     */
    public function testSchrodingersCat($bool)
    {
        $method = 'assertTrue';
        if (mt_rand(0, 1) === 1) {
            $method = 'asserTrue';
        }

        $this->$method($bool, 'Green is the new red!');
    }
}
