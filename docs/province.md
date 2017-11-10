# Province

**Table**: `provinces`

### Fields

| Name       | Type                                   | Details                      |
|:-----------|:---------------------------------------|:-----------------------------|
| id         | autoinc                                |                              |
| country_id | char(2)                                | fk -> countries              |
| type       | enum, [ProvinceType](province-type.md) |                              |
| code       | string(16)                             | National identification code |
| name       | string                                 | -                            |

### Relations

| Name    | Type                  | Returns                             |
|---------|-----------------------|-------------------------------------|
| country | [Country](country.md) | The country the province belongs to |

### Methods

#### findByCountryAndCode

Returns a single province by country and the province's national code.

```php
$brasov = Province::findByCountryAndCode('RO', 'BV');
// or
$romania = Country::find('RO');
$brasov = Province::findByCountryAndCode($romania, 'BV');
```

### Seeders

The package contains several province/state seeders for various countries.

For more details refer to the [seeders](seeders.md) section for more details.