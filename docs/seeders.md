# Seeders

This package contains the following seeders in the `src/resources/database/seeds` folder:

| Name                                    | Type of Entries         | Contains                                               |
|:----------------------------------------|:------------------------|:-------------------------------------------------------|
| `Countries`                             | [Country](country.md)   | All the countries in the World                         |
| `CountiesOfHungary`                     | [Province](province.md) | Hungarian counties (megye)                             |
| `CountiesOfRomania`                     | [Province](province.md) | Romanian counties (județ)                              |
| `ProvincesAndRegionsOfBelgium`          | [Province](province.md) | Belgian Provinces & Regions (gewest/région)            |
| `ProvincesAndTerritoriesOfCanada`       | [Province](province.md) | Canadian Provinces & Territories (English)             |
| `ProvincesAndTerritoriesOfCanadaFrench` | [Province](province.md) | Canadian Provinces & Territories (French)              |
| `ProvincesOfIndonesia`                  | [Province](province.md) | Provinces, geographical units and regions of Indonesia |
| `ProvincesOfNetherlands`                | [Province](province.md) | Provinces of Netherlands (provincie)                   |
| `StatesAndTerritoriesOfIndia`           | [Province](province.md) | Indian States & Union territories                      |
| `StatesOfGermany`                       | [Province](province.md) | States of Germany (Bundesland)                         |
| `StatesOfUsa`                           | [Province](province.md) | States, DC, territories and military areas of the USA  |

## The Countries Seeder

Besides using as a standard Laravel Seeder, the countries seeder can also be used as a standalone class to retrieve the
countries of the world.

> This standalone usage feature of the countries seeder was added in version `3.4.0`

### Get All Countries

```php
Countries::all();
// [
//   'AF' => ['id' => 'AF', 'name' => 'Afghanistan', 'phonecode' => 93, 'is_eu_member' => 0],
//   'AL' => ['id' => 'AL', 'name' => 'Albania', 'phonecode' => 355, 'is_eu_member' => 0],
//   'DZ' => ['id' => 'DZ', 'name' => 'Algeria', 'phonecode' => 213, 'is_eu_member' => 0],
//   [...]
// ]
```

### Get A Single Country By Code

```php
Countries::byCode('AS');
// ['id' => 'AS', 'name' => 'American Samoa', 'phonecode' => 1684, 'is_eu_member' => 0]

// Input is case-insensitive:
Countries::byCode('ai');
// ['id' => 'AI', 'name' => 'Anguilla', 'phonecode' => 1264, 'is_eu_member' => 0],

// When no country exists by code, it returns NULL
Countries::byCode('nope');
// NULL
```

## Provinces Seeder

Besides using as a standard Laravel Seeder, the various province seeders can be used as a standalone utility classes
to manage the provinces of the world.


> This `ProvinceSeeders` registry was added in version `3.4.0`

## Loading

### With Artisan

```bash
php artisan db:seed --class="\Konekt\Address\Seeds\Countries"
```

### Adding To Your App's DatabaseSeeder

```php
class DatabaseSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        //...
        $this->call(\Konekt\Address\Seeds\Countries::class);
        //...
    }
}
```

> For more details refer to the [seeds section](https://konekt.dev/concord/1.3/seeds) in the Concord
docs.
