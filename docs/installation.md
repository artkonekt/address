# Installation

### With Composer

1. `composer require konekt/address`
2. If concord hasn't been installed yet, [install it](https://artkonekt.github.io/concord/#/installation)
3. Edit `config/concord.php` and add the address module:

```php
return [
    'modules' => [
        Konekt\Address\Providers\ModuleServiceProvider::class
    ]
];
```

After this, address should be listed among the concrd modules:

```
php artisan concord:modules -a

+----+-----------------------+--------+---------+------------------+-----------------+
| #  | Name                  | Kind   | Version | Id               | Namespace       |
+----+-----------------------+--------+---------+------------------+-----------------+
| 1. | Konekt Address Module | Module | 0.9.4   | konekt.address   | Konekt\Address  |
+----+-----------------------+--------+---------+------------------+-----------------+
```
