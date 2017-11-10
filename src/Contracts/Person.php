<?php
/**
 * Contains the Person interface.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-04-09
 *
 */


namespace Konekt\Address\Contracts;

interface Person
{

    /**
     * Returns the full name of the person (in appropriate name order)
     *
     * @return string
     */
    public function getFullName();
}
