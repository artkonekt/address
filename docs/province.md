# Province

The province model is based on the [ISO 3166-2](https://en.wikipedia.org/wiki/ISO_3166-2) standard.
The purpose of the standard is to define codes for identifying the subdivisions (e.g., provinces or
states) of countries.

> Although the name of the model/table is `Province` it actually supports multiple types of
> country subdivisions like states, counties, territories, municipalities, etc.
> See [Province Types](province-type.md) for a list of predefined types.

## Database Table Fields

> Table name: `provinces`

| Name       | Type                                   | Details         |
|:-----------|:---------------------------------------|:----------------|
| id         | autoinc                                |                 |
| country_id | char(2)                                | fk -> countries |
| parent_id  | int                                    | fk -> self      |
| type       | enum, [ProvinceType](province-type.md) |                 |
| code       | string(16)                             | ISO 3166-2 Code |
| name       | string                                 | -               |

## Relations

| Name     | Type                  | Returns                                |
|:---------|:----------------------|:---------------------------------------|
| country  | [Country](country.md) | The country the province belongs to    |
| parent   | Province\|null        | The parent province (if any)           |
| children | Collection            | Collection of child provinces (if any) |

## Retrieving Models

### Locate by Country and Code

The `findByCountryAndCode` static method returns a single province by country and the province's
code:

```php
$brasov = Province::findByCountryAndCode('RO', 'BV');
// or
$romania = Country::find('RO');
$brasov = Province::findByCountryAndCode($romania, 'BV');
```

If no results are found, null is returned:

```php
$zdish = Province::findByCountryAndCode('DE', 'XY');
dd($zdish);
// NULL
```

### Locate by Country

The predefined `byCountry` [scope](https://laravel.com/docs/8.x/eloquent#local-scopes) can fetch
provinces by country:

```php
$statesOfGermany = Province::byCountry('DE')->get();

// Can also pass a country model:
$holland = Country::find('NL');
$provincesOfHolland = Province::byCountry($holland)->get();
```

### Locate by Type

The predefined `byType` [scope](https://laravel.com/docs/8.x/eloquent#local-scopes) can fetch
provinces by type:

```php
$counties = Province::byType('county')->get();

// Can also pass a ProvinceType enum object:
$states = Province::byType(ProvinceType::STATE())->get();

// Scopes can be combined:
$regionsOfBelgium = Province::byCountry('BE')->byType('region')->get();
```

## Parents and Children

Countries can be divided into subdivisions of subdivisions, like:

- Counties within States (eg. USA)
- Provinces within Geographical units (eg. Indonesia)
- Provinces within Regions (eg. Belgium)

To support these, provinces can optionally have a single parent and/or one or more children.
Parent & Children are also the same `Province` type models.

### Specifying Parent Province

```php
$jawa = Province::create([
    'country_id' => 'ID',
    'name' => 'Jawa',
    'type' => ProvinceType::UNIT()
]);

$banten = Province::create([
    'country_id' => 'ID',
    'name' => 'Banten',
    'type' => ProvinceType::PROVINCE(),
    'parent_id' => $jawa->id
]);

echo $banten->parent->name;
// Jawa

var_dump($jawa->hasParent());
// bool(false)
```

Other than setting the `parent_id` field directly, it is also possible to call the setter method:

```php
$childProvince->setParent($parentProvince);
$childProvince->save();
```

To dissociate the parent use:

```php
$childProvince->removeParent();
$childProvince->save();

var_dump($childProvince->parent_id);
// NULL
var_dump($childProvince->parent);
// NULL
```

### Child Provinces

Provinces can have multiple children.

The `children` property returns a Collection of child provinces.

```php

$flanders = Province::findByCountryAndCode('BE', 'VLG');

foreach ($flanders->children as $flemishRegion) {
    echo "{$flemishRegion->name}\n";
}
// Antwerp
// East Flanders
// Flemish Brabant
// Limburg
// West Flanders
```

## Seeders

The package contains several province/state seeders for various countries.

For more details refer to the [seeders](seeders.md) section for more details.
