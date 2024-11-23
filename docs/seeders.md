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

> For more details refer to the [seeds section](https://konekt.dev/concord/1.x/seeds) in the Concord
> docs.

## The Countries Seeder

Besides using as a standard Laravel Seeder, the countries seeder can also be used as a standalone class to retrieve the
countries of the world.

> This standalone usage feature of the countries seeder was added in version `3.4.0`

### Get All Countries

```php
use Konekt\Address\Seeds\Countries;

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

## Provinces Seeders

All province seeders implement the [ProvinceSeeder](https://github.com/artkonekt/address/blob/3.x/src/Contracts/ProvinceSeeder.php)
interface, which defines 4 methods.

#### Country Code of the Seeder

The static `getCountryCode()` method returns the country for which the seeder contains data.

```php
StatesAndTerritoriesOfIndia::getCountryCode();
// 'IN'
```

#### The Contained Province Types

The `getProvinceTypes()` static method returns an array of [ProvinceType](province-type.md) enum objects, which
represents the list of the types of provinces the seeder supplies.

```php
StatesOfUsa::getProvinceTypes();
//= [
//    Konekt\Address\Models\ProvinceType {#7780},
//    Konekt\Address\Models\ProvinceType {#7782},
//    Konekt\Address\Models\ProvinceType {#7784},
//    Konekt\Address\Models\ProvinceType {#7775},
//  ]

array_map(fn($t) => $t->value(), StatesOfUsa::getProvinceTypes());
//= [
//    "state",
//    "federal_district",
//    "military",
//    "territory",
//  ]
```

### The Title of the Seeder

The static `getName()` method returns a human-readable title of the seeder.

```php
StatesOfUsa::getName();
//= "States, territories and other districts of the USA"
```

### Running the Seeder

The `run()` method (non-static) of a seeder is the [Laravel-standard method](https://laravel.com/docs/11.x/seeding#writing-seeders)
that inserts the records in the appropriate database tables. 

## Province Seeder Registry

> This `ProvinceSeeders` registry was added in version `3.4.0`

Besides using as a standard Laravel Seeder, the various province seeder classes can be used as a standalone utilities
to manage the provinces of countries.

For this purpose, the `ProvinceSeeders` registry class is available. It can be used to list, create and add new province
seeders to the system.

### Obtain Seeders

To get the **list of seeders** available use the `ids()` method:

```php
use \Konekt\Address\Seeds\ProvinceSeeders;

ProvinceSeeders::ids();
//= [
//    "counties_of_hungary",
//    "counties_of_romania",
//    "provinces_and_regions_of_belgium",
//    "provinces_and_territories_of_canada",
//    "provinces_and_territories_of_canada_french",
//    "provinces_of_indonesia",
//    "provinces_of_netherlands",
//    "states_and_territories_of_india",
//    "states_of_germany",
//    "states_of_usa",
//  ]
```

To **obtain an instance** of a given seeder, use the registry's `make()` method, passing the registered seeder ID:

```php
$belgiumSeeder = ProvinceSeeders::make('provinces_and_regions_of_belgium');
//= Konekt\Address\Seeds\ProvincesAndRegionsOfBelgium {#7788}

// To insert the supplied records:
$belgiumSeeder->run(); 
```

The `choices()` method returns a list of key/value pairs, where the key is the seeder ID and the value is the
human-readable name of the seeders:

```php
ProvinceSeeders::choices();
//=[
//  "counties_of_hungary" => "Counties of Hungary"
//  "counties_of_romania" => "Counties of Romania"
//  "provinces_and_regions_of_belgium" => "Provinces and Regions of Belgium"
//  "provinces_and_territories_of_canada" => "Provinces and Territories of Canada (English)"
//  "provinces_and_territories_of_canada_french" => "Provinces and Territories of Canada (French)"
//  "provinces_of_indonesia" => "Provinces and Regions of Indonesia"
//  "provinces_of_netherlands" => "Provinces of the Netherlands"
//  "states_and_territories_of_india" => "States and Territories of India"
//  "states_of_germany" => "States of Germany"
//  "states_of_usa" => "States, territories and other districts of the USA"
//]
```

#### Seeders of a Country

To get the available province **seeders of a country**, use the `availableSeedersOfCountry()` method:

```php
ProvinceSeeders::availableSeedersOfCountry('NL');
//= [
//    "provinces_of_netherlands" => "Konekt\Address\Seeds\ProvincesOfNetherlands",
//  ]
```

!> Be aware that there can be multiple seeders for a single country. As an example, Canada has two seeders, an English and a French one.

```php
ProvinceSeeders::availableSeedersOfCountry('CA')
//= [
//    "provinces_and_territories_of_canada" => "Konekt\Address\Seeds\ProvincesAndTerritoriesOfCanada",
//    "provinces_and_territories_of_canada_french" => "Konekt\Address\Seeds\ProvincesAndTerritoriesOfCanadaFrench",
//  ]
```

### Extending Province Seeders

**This package doesn't come with the provinces of all countries**, only offers a limited set of them.

But it is possible to write extensions for specific countries and register them.

A sample custom province seeder class:

```php
namespace App;

use Illuminate\Database\Seeder;
use Konekt\Address\Contracts\ProvinceSeeder;
use Konekt\Address\Models\ProvinceType;

class RegionsOfAbsurdistan extends Seeder implements ProvinceSeeder
{
    use IsProvinceSeeder;

    protected static string $forCountry = 'AB';

    protected static array $provinceTypes = [ProvinceType::REGION]
    
    public static function getName(): string
    {
        return __('Regions of the Imaginary Absurdistan');
    }
    
    public function run(): void
    {
        // insert the records here        
    }
}
```

To register the seeder, use the following code, most commonly in the package's ServiceProvider or the app's AppServiceProvider class:

```php
public function boot()
{
    ProvinceSeeders::extend(RegionsOfAbsurdistan::class);
}
```

Afterward, the province seeder will be available for the country:

```php
ProvinceSeeders::availableSeedersOfCountry('AB');
// ['regions-of-absurdistan' => 'App\RegionsOfAbsurdistan']

// Create the seeder:
$seeder = ProvinceSeeders::make('regions-of-absurdistan');
// To create the provinces:
$seeder->run();
```
