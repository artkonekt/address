# Address Module Changelog

## 2.1.0
##### 2020-12-07

- Added PHP 8 support

## 2.0.0
##### 2020-10-11

- BC: Address, Country and Person interfaces have been extended
- BC: Enums have been upgraded to v3
- Dropped Laravel 5 support
- Dropped PHP 7.2 support

## 1.3.0
##### 2020-09-12

- Added Laravel 8 support

## 1.2.1
##### 2020-09-09

- Excluded doctrine/dbal `v2.10.3` that breaks the streamline_provinces migration on SQLite.

## 1.2.0
##### 2020-03-14

- Added Laravel 7 support
- Dropped PHP 7.1 support

## 1.1.0
##### 2019-11-23

- Added Laravel 6 support
- Removed Laravel 5.4 support
- India seeder has been updated according to Jammu and Kashmir Reorganisation act
- Minimum required Concord version is 1.4+

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
