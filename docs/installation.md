# Installation

### With Composer

1. `composer require konekt/address`
2. Edit `config/concord.php` and add the address module:

```php
return [
    'modules' => [
        Konekt\Address\Providers\ModuleServiceProvider::class
    ]
];
```

After this, address should be listed among the concord modules:

```text
php artisan concord:modules -a

+----+-----------------------+--------+---------+------------------+-----------------+
| #  | Name                  | Kind   | Version | Id               | Namespace       |
+----+-----------------------+--------+---------+------------------+-----------------+
| 1. | Konekt Address Module | Module | 3.7.0   | konekt.address   | Konekt\Address  |
+----+-----------------------+--------+---------+------------------+-----------------+
```
