# Seeders

This package contains the following seeders in the `src/resources/database/seeds` folder:

|           Name           |          Type           |            Contains            |
|:-------------------------|:------------------------|:-------------------------------|
| `Countries`              | [Country](country.md)   | All the countries in the World |
| `CountiesOfHungary`      | [Province](province.md) | Counties of Hungary            |
| `CountiesOfRomania`      | [Province](province.md) | Counties of Romania            |
| `ProvincesOfNetherlands` | [Province](province.md) | Provinces of Netherlands       |
| `StatesOfGermany`        | [Province](province.md) | States of Germany              |
| `StatesOfIndia`          | [Province](province.md) | States of India                |
| `StatesOfUsa`            | [Province](province.md) | States of the USA              |

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

For more details refer to the [seeds section](https://konekt.dev/concord/1.3/seeds) in the
Concord docs.
