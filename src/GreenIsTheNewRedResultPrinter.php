<?php

namespace WyriHaximus\PHPUnit\GreenIsTheNewRed;

use PHPUnit\TextUI\ResultPrinter;

final class GreenIsTheNewRedResultPrinter extends ResultPrinter
{
    /**
     * Swap red and green colours and call parent
     *
     * @param string $color
     * @param string $buffer
     *
     * @return string
     */
    protected function formatWithColor($color, $buffer)
    {
        $step1 = str_replace(
            [
                'fg-red',
                'bg-red',
                'fg-green',
                'bg-green',
            ],
            [
                'fg-fail',
                'bg-fail',
                'fg-red',
                'bg-red',
            ],
            $color
        );

        $step2 = str_replace(
            [
                'fg-fail',
                'bg-fail',
            ],
            [
                'fg-green',
                'bg-green',
            ],
            $step1
        );

        return parent::formatWithColor($step2, $buffer);
    }
}
