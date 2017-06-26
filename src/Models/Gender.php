<?php
/**
 * Contains the Gender enum class.
 *
 * @copyright   Copyright (c) 2016 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2016-12-04
 *
 */


namespace Konekt\Address\Models;


use Konekt\Address\Contracts\Gender as GenderContract;
use Konekt\Enum\Enum;

class Gender extends Enum implements GenderContract
{
    const MALE   = 'm';
    const FEMALE = 'f';

}