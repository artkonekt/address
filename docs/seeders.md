# Seeders

This package contains the following seeders in the `src/resources/database/seeds` folder:

| Name                           | Type of Entries         | Contains                                               |
|:-------------------------------|:------------------------|:-------------------------------------------------------|
| `Countries`                    | [Country](country.md)   | All the countries in the World                         |
| `CountiesOfHungary`            | [Province](province.md) | Hungarian counties (megye)                             |
| `CountiesOfRomania`            | [Province](province.md) | Romanian counties (județ)                              |
| `ProvincesOfNetherlands`       | [Province](province.md) | Provinces of Netherlands (provincie)                   |
| `ProvincesAndRegionsOfBelgium` | [Province](province.md) | Belgian Provinces & Regions (gewest/région)            |
| `ProvincesOfIndonesia`         | [Province](province.md) | Provinces, geographical units and regions of Indonesia |
| `StatesOfGermany`              | [Province](province.md) | States of Germany (Bundesland)                         |
| `StatesAndTerritoriesOfIndia`  | [Province](province.md) | Indian States & Union territories                      |
| `StatesOfUsa`                  | [Province](province.md) | States, DC, territories and military areas of the USA  |

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
