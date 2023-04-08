<?php

declare(strict_types=1);

/**
 * Contains the Language class.
 *
 * @copyright   Copyright (c) 2023 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2023-04-08
 *
 */

namespace Konekt\Address\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Konekt\Address\Contracts\Language as LanguageContract;

/**
 * @property string $id
 * @property string $name
 * @property string $native_name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Language extends Model implements LanguageContract
{
    public $incrementing = false;

    protected $guarded = ['created_at', 'updated_at'];

    public static function findByIsoCode(string $code): ?LanguageContract
    {
        return static::where('id', $code)->first();
    }

    public function getIsoCode(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getNativeName(): string
    {
        return $this->native_name;
    }
}
