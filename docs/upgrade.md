# Upgrade

## 2.x -> 3.x

The new minimal requirements are:

- PHP **8.1**: 3.0 - 3.3;
- PHP **8.2**: 3.4+
- Laravel 10
- Enum 4.1

### Interface Changes

If you are using custom Country or Address models in your application, make sure they comply with the following changes:

1. The `iso2Code()` and the `getName()` methods have been added to the `Country` interface.
2. The `model()` method has been added to the `Address` interface

### Enum Interface

The `AddressType`, `Gender`, `NameOrder`, `ProvinceType`, `ZoneMemberType`, and `ZoneScope`
interfaces now extend the v4.1 `EnumInterface`, meaning they have more methods than before.

It's almost certain that you don't need to do anything with it, because the base Enum class
implements those methods anyway. Regardless of that, it's a breaking change.

## 1.x -> 2.x

The new minimal requirements are:

- PHP 7.3+
- Laravel 6+

### Enum Upgrade to V3

The address module has upgraded its enum dependency from v2 to v3.
This means that all the `__default` constants have been renamed to `__DEFAULT` (value unchanged).

Affected classes:
- `AddressType`
- `NameOrder`
- `ProvinceType`

All your enums must be [upgraded to v3](https://konekt.dev/enum/3.0/upgrade#from-v2-to-v3).
This way the codebase fully complies with the PSR-1 standard.

This is a breaking change, so you have to check your codebase for enums that have
`__default` constants defined and rename them to `__DEFAULT`.

### Interface Changes

#### Address

The `Address` interface has 2 new methods. If you implemented your own variant of this model, make
sure these methods are there, and have this signature:

```php
public function country(): BelongsTo;
public function province(): BelongsTo;
```

#### Country

The `Country` interface has a new method. If you implemented your own variant of this model, make
sure the new method is there, and has this signature:

```php
public function provinces(): HasMany;
```

#### Person

The `string` return type declaration has been added to the `Person` interface's getFullName method:

```php
public function getFullName(): string;
```

If you implemented your own variant of this model, make sure the method signature matches the new
definition.
