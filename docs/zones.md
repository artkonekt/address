# Zones

> The zones feature has been added in version `2.5.0`

A zone represents a geographic area that can be composed of a set of countries and/or provinces.

This can be very useful when different rules apply depending on which zone an address is located in.
Typical use cases for zones are:

- varying shipping fees;
- tax (VAT, Sales Tax) calculation;
- geographic pricing;
- GDPR-related extra content in EU countries.

## Creating Zones

A zone can be created just by passing a name:

```php
Zone::create(['name' => 'New York metropolitan area'])
```

### Zone Scopes

Every zone has a scope, which can be one of the followings:

- shipping _(default)_,
- billing,
- taxation,
- pricing,
- content.

The values come from the `ZoneScope` enum,
that [you can extend](https://konekt.dev/concord/1.x/enums#extending-enums)
in your application.

If no explicit scope is defined for the zone at creation, it will be the enum's
default value, i.e. `shipping` out of the box.

### Adding Zone Members

[Countries](country.md) and [provinces](province.md) can be added to zones as members.

Countries can be added via model object, or simply using their ids,
which is their [ISO 3166](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) code:

```php
$eu = Zone::create(['name' => 'European Union']);
// Add one country via its country code:
$eu->addCountry('NL');

// Add one country using its model:
$germany = Country::find('DE');
$eu->addCountry($germany)

// Adding multiple countries via their codes:
$eu->addCountries('BE', 'FR', 'ES', 'PT', 'IT');

// Adding multiple countries via models:
$czechia = Country::find('CZ');
$slovakia = Country::find('SK');
$eu->addCountries($czechia, $slovakia);
```

Provinces can be added by passing their model objects:

```php

$quebec = Province::findByCountryAndCode('CA', 'QC')
$ontario = Province::findByCountryAndCode('CA', 'ON')

$zone = Zone::create(['name' => 'Quebec-Ontario']);
$zone->addProvinces($quebec, $ontario);
```

## Matching Zones

### Checking a Country in a Zone

A zone can tell whether a country is part of it:

```php
$centralEurope = Zone::create(['name' => 'Central Europe']);
$centralEurope->addCountries('DE', 'CZ', 'PL', 'SK', 'AT', 'HU', 'SI')

$centralEurope->isCountryPartOfIt('CZ');
// true
$centralEurope->isCountryPartOfIt('FR');
// false
```

### Checking a Province in a Zone

Similarly, provinces can be checked against zones:

```php
$brasov = Province::findByCountryAndCode('RO', 'BV');
$sibiu = Province::findByCountryAndCode('RO', 'SB');
$neamt = Province::findByCountryAndCode('RO', 'NT');

$transylvania = Zone::create(['name' => 'Transylvania']);
$transylvania->addProvinces($brasov, $sibiu);

$transylvania->isProvincePartOfIt($sibiu);
// true
$transylvania->isProvincePartOfIt($brasov);
// true
$transylvania->isProvincePartOfIt($neamt);
// false
```

### Checking if an Address is in a Zone

Addresses - if their country or their province is part of a zone - can be checked if they're in a zone.

```php
$centralMacedoniaRegion = Province::create([
    'country_id' => 'GR',
    'name' => 'Central Macedonia',
    'code' => 'B',
    'type' => ProvinceType::REGION,
]);

$ancientMacedonia = Zone::create(['name' => 'Macedonia (ancient)']);
$ancientMacedonia->addCountry('MK');
$ancientMacedonia->addProvince($centralMacedoniaRegion);

$addressInNorthMacedonia = Address::create([
    'country_id' => 'MK',
    'city' => 'Skopje',
    'address' => 'Boulevard Goce Delchev 5',
]);

$addressInThessaloniki = Address::create([
    'country_id' => 'GR',
    'city' => 'Thessaloniki',
    'province_id' => $centralMacedoniaRegion
    'address' => 'Protomagias 25',
]);

$ancientMacedonia->isAddressPartOfIt($addressInNorthMacedonia);
//true
$ancientMacedonia->isAddressPartOfIt($addressInThessaloniki);
//true
```

## Finding Zones for Addresses, Provinces and Countries

To find the zones an address, province or country belongs to, use the `Zones`
utility that simplifies querying zones.

```php
Zones::withAnyScope()->theCountryBelongsTo('IN');
// Collection of `Zone` models
```

It is also possible to return zones with a specific scope.

```php
$bavaria = Province::findByCountryAndCode('DE', 'BY')
Zone::create(['name' => 'South East Germany', 'scope' => ZoneScope::SHIPPING])->addProvince($bavaria);

Zones::withShippingScope()->theProvinceBelongsTo($bavaria);
// Illuminate\Database\Eloquent\Collection
//  #items: array:1 [
//    0 => Konekt\Address\Models\Zone
//      #attributes: array:5 [
//        "id" => 1
//        "name" => "South East Germany"
//        "scope" => "shipping"
//      ]

// Querying for another scope
Zones::withBillingScope()->theProvinceBelongsTo($bavaria);
// empty Collection
```



```php
$addressInSweden = Address::create(['country_id' => 'SE', 'city' => 'Borås', 'name' => 'Antoinette Suromy', 'address' => 'Gustav Adolfsgatan 500', 'postalcode' => '500 00']);

$scandinavia = Zone::create(['name' => 'Scandinavia', 'scope' => ZoneScope::PRICING]);
$scandinavia->addCountries('SE', 'FI', 'DK', 'NO');

Zones::withPricingScope()->theAddressBelongsTo($addressInSweden);
// Illuminate\Database\Eloquent\Collection
//  #items: array:1 [
//    0 => Konekt\Address\Models\Zone
//      #attributes: array:5 [
//        "id" => 1
//        "name" => "Scandinavia"
//        "scope" => "pricing"
//      ]

Zones::withTaxationScope()->theAddressBelongsTo($addressInSweden);
// empty Collection
```
