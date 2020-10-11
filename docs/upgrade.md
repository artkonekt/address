# Upgrade

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
