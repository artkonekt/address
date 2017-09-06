# Country

**Table**: `countries`

### Fields

| Name         | Type    |   |
|--------------|---------|---|
| id           | char(2) |   |
| name         | string  |   |
| phonecode    | int     |   |
| is_eu_member | bool    |   |

### Relations

| Name      | Type                               | Returns                                                   |
|-----------|------------------------------------|-----------------------------------------------------------|
| provinces | [Province](province.md) collection | All the provinces of the country                          |
| states    | [Province](province.md) collection | The `state` [type](province-type.md) provinces of the country |
| counties    | [Province](province.md) collection | The `county` [type](province-type.md) provinces of the country |

### Seeders

The package ships with the `Konekt\Address\Seeds\Countries` seeder
(`src/resources/database/seeds` folder) that loads all the countries of
the world in the DB.

#### Loading With Artisan

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
