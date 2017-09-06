# Seeders

This package contains the following seeders in the `src/resources/database/seeds` folder:

| Name                | Type                    | Contains                       |
|---------------------|-------------------------|--------------------------------|
| `Countries`         | [Country](country.md)   | All the countries in the World |
| `CountiesOfRomania` | [Province](province.md) | Counties of Romania            |
| `StatesOfUsa`       | [Province](province.md) | States of the USA              |

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

For more details refer to the [seeds section](https://artkonekt.github.io/concord/#/seeds) in the Concord docs.
