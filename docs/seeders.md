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

### Loading

#### With Artisan

```bash
php artisan db:seed --class="\Konekt\Address\Seeds\Countries"
```

#### Adding To Your App's DatabaseSeeder

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

For more details refer to the [seeds section](https://konekt.dev/concord/1.3/seeds) in the Concord
docs.
