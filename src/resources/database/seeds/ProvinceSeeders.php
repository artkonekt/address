<?php

declare(strict_types=1);

namespace Konekt\Address\Seeds;

use Illuminate\Support\Str;
use InvalidArgumentException;
use Konekt\Address\Contracts\ProvinceSeeder;
use Konekt\Extend\Concerns\HasRegistry;
use Konekt\Extend\Concerns\RequiresClassOrInterface;
use Konekt\Extend\Contracts\Registry;

class ProvinceSeeders implements Registry
{
    use HasRegistry;
    use RequiresClassOrInterface;

    protected static string $requiredInterface = ProvinceSeeder::class;

    public static function make(string $id, array $parameters = []): object
    {
        if (null === $class = self::getClassOf($id)) {
            throw new InvalidArgumentException(
                "No type is registered with the id `$id`."
            );
        }

        return app()->make($class, $parameters);
    }

    /** @return ProvinceSeeder[] */
    public static function availableSeedersOfCountry(string $country): array
    {
        return array_filter(self::$registry, fn ($class) => $class::getCountryCode() === $country);
    }

    public static function extend(string $seederClass): void
    {
        self::add(self::generateId($seederClass), $seederClass);
    }

    private static function generateId(string $class): string
    {
        return Str::snake(class_basename($class));
    }
}
