<?php
/**
 * Contains the PersonNameSplitter class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-11-24
 *
 */

namespace Konekt\Address\Utils;

use Konekt\Address\Contracts\NameOrder;
use Konekt\Address\Models\NameOrderProxy;

class PersonNameSplitter
{
    /**
     * Parse and split a fullname into firstname & lastname.
     *
     * Returns an array with attributes as keys eg.:
     * $name = 'Charlie Firpo' -> [ 'firstname' => 'Charlie', 'lastname' => 'Firpo']
     *
     * Note that these are just rough guesses
     *
     * @param string    $name
     * @param NameOrder $nameOrder
     *
     * @return array
     */
    public static function split($name, NameOrder $nameOrder = null)
    {
        $name      = trim($name);
        $parts     = explode(' ', $name);
        $nameOrder = $nameOrder ?: NameOrderProxy::create(); // create default if none was given

        switch (count($parts)) {
            case 1:
                return ['firstname' => $name];
                break;
            case 2:
                if ($nameOrder->isEastern()) {
                    return [
                        'firstname' => $parts[1],
                        'lastname'  => $parts[0]
                    ];
                }

                return [
                    'firstname' => $parts[0],
                    'lastname'  => $parts[1]
                ];
                break;
            case 3:
                if ($nameOrder->isEastern()) {
                    return [
                        'firstname' => $parts[1] . ' ' . $parts[2] ,
                        'lastname'  => $parts[0]
                    ];
                }

                return [
                    'firstname' => $parts[0] . ' ' . $parts[1],
                    'lastname'  => $parts[2]
                ];
                break;
        }

        if ($nameOrder->isEastern()) {
            return [
                'firstname' => array_last($parts),
                'lastname'  => implode(' ', array_except($parts, count($parts) - 1))
            ];
        }

        return [
            'firstname' => array_first($parts),
            'lastname'  => implode(' ', array_except($parts, 0))
        ];
    }
}
