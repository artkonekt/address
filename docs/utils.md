# Utilities

## European Union

This package contains a utility class called `EuropeanUnion`. It can tell if a country is (or was) the member of the EU
on a given date, and can validate the **format** of EU VAT numbers.

### Is Country an EU Member

To tell if a country is currently the member of the EU, use the `isMemberState()` method:

```php
use Konekt\Address\Utils\EuropeanUnion;

EuropeanUnion::isMemberState('PT');
// => true

EuropeanUnion::isMemberState('US');
// => false
```

To check if a country was the part of the EU on a certain date, pass the second parameter:

```php
EuropeanUnion::isMemberState('UK', new DateTime('2010-07-30'));
// => true

EuropeanUnion::isMemberState('UK', new DateTime('2024-03-11'));
// => false
// The UK has left the EU on 2020-01-31

EuropeanUnion::isMemberState('HR', new DateTime('2013-06-30'));
// => false

EuropeanUnion::isMemberState('HR', new DateTime('2013-07-01'));
// => true
// Croatia joined the EU on 2013-07-01
```

### Validate EU VAT Number Format

To check whether a string has a valid EU VAT number **format**, use the `validateVatNumberFormat()` method.
Every country has specific rules about the prefix, length and the possible characters at certain positions in their
VAT numbers. The validation verifies against all these rules.

!> This check **only validates the number format** and does not do a [VIES lookup](https://ec.europa.eu/taxation_customs/vies/) to check if the VAT number is actually valid!  

The method either returns the country code which the VAT number belongs to, or `false` if the string is not a valid EU VAT number:

```php
EuropeanUnion::validateVatNumberFormat('1234');
// => false

EuropeanUnion::validateVatNumberFormat('DE332537240');
// => 'DE'

EuropeanUnion::validateVatNumberFormat('RO35409777');
// => 'RO'

EuropeanUnion::validateVatNumberFormat('DK123');
// => false
```

Greece and the United Kingdom have a different VAT ID prefix than their ISO country code.
Even in their case, their country code is returned, and not the VAT ID prefix.

Greece and UK Examples:

```php
// Greece has the `EL` VAT id prefix:
EuropeanUnion::validateVatNumberFormat('EL332537240');
// => GR

// The United Kingdom has the `GB` VAT id prefix:
EuropeanUnion::validateVatNumberFormat('GB123456789');
// => UK
```

## The Zoneable Trait

> Available since v3.3

If you have a model that can be assigned to a [zone](zones.md), then the easiest way to add
such behavior to it is to use the `Zoneable` trait. It requires the model to have a `zone_id` field
that points to the id of a [zone](zones.md) record.

It adds the following features to the model:

- the `getZone(): ?Zone` method,
- the `isZoneRestricted(): bool` and `isNotZoneRestricted(): bool` methods,
- the `forZone(int|Zone $zone): Builder` scope,
- the `forZones(array|Collection $zones): Builder` scope, and
- the `zone(): BelongsTo` relationship

Usage example:

```php
class ShippingMethod extends Model
{
    use Zoneable;
}

$haitiShippingZones = Zones::withShippingScope()->theCountryBelongsTo('HT');

$shippingMethodsForHaiti = ShippingMethod::forZones($haitiShippingZones)->get();
```

To get the zone of a "zoneable" model:

```php
$shippingMethod = ShippingMethod::find(1);
$shippingMethod->getZone();
// => Konekt\Address\Models\Zone
```
