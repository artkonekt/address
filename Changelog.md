# Address Module Changelog

## 1.0

## 1.0.1
##### 2019-08-17

- Migration fix (for downwards direction with MySQL)

## 1.0

## 1.0.0
##### 2019-08-11

- Added parents/children to Provinces
- Changed `province.type` field in the DB it's plain varchar, no longer enum (The `type` field on the PHP model class is still `ProvinceType` enum)
- Added indices to province tables for integrity and speed
- Added India states seeder
- Added Indonesia provinces seeder
- Improved Belgium and Hungary seeders
- The `Province` interface has been extended with new methods
- Dropped PHP 7.0 support
- Added PHP 7.3 support
- Added Laravel 5.8 support
- CI against MySQL and Postgres
- Laravel 5.4 CI has been dropped (still works with Laravel 5.4 at the time of the release)
- Documentation improved


## 0.9

## 0.9.7
##### 2018-10-21

- Changelog has started
- Added Belgium, Germany, Hungary and Netherlands country subdivisions seeders.
- Proven to work with PHP 7.0 - 7.2, Laravel 5.4 - 5.7
