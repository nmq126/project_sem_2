<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class OrderStatus extends Enum
{
    const WaitForCheckout = 0;
    const Waiting = 1;
    const Processing = 2;
    const Delivering = 3;
    const Done = 4;
    const Cancel = -2;
    const All = -1;

}
