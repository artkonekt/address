# Address Module Changelog

## 3.4.0
##### 2024-11-23

- Added the konekt/xtend requirement
- Added the `ProvinceSeeders` registry
- Added the `ProvinceSeeder` interface and decorated all existing province seeders with it
- Extended the `Countries` seeder so that the list of countries can be simply read using `Countries::all()` and `Countries::byCode($code)`
- Dropped PHP 8.1 support
- Added PHP 8.4 support

## 3.3.2
##### 2024-10-22

- Fixed the AddressType enum def in the Address model to use the proxy instead of the hardcoded class by [Ouail](https://github.com/ouail) in [#9](https://github.com/artkonekt/address/pull/9)

## 3.3.1
##### 2024-04-10

- Added the `isZoneRestricted()` and `isNotZoneRestricted()` methods to the `Zoneable` trait

## 3.3.0
##### 2024-04-10

- Added the `Zoneable` trait that can be added to models that can optionally belong to a Zone
- Changed the input string processing at the `Zones::theCountryBelongsTo()` method so that it converts the argument to uppercase before comparison 

## 3.2.0
##### 2024-04-03

- Added the `EuropeanUnion::isNotAMemberState()` method

## 3.1.0
##### 2024-03-11

- Added the `EuropeanUnion` utility class to check for members and validate tax numbers

## 3.0.0
##### 2024-02-28

- Dropped Laravel 9 support
- Dropped Enum v3 Support
- Dropped PHP 8.0 support
- Added PHP 8.3 support
- Added Laravel 11 support
- Added Doctrine DBAL v4 support ~~(required for Laravel 11)~~
- Removed the Doctrine based migration-workaround for modifying table with enum column that wasn't necessary after Laravel 6
- Changed minimum Enum version to v4.1
- BC: Changed all enum interfaces to extend the root `EnumInterface`
- BC: added the `iso2Code()` and the `getName()` methods to the `Country` interface
- BC: added the `model()` method to the `Address` interface
- Added firstname, lastname, company_name, email, phone, address2, access_code, tax_nr and registration_nr fields to the Address table/model
- Added a generic, optional and polymorphic `model` relationship to the Address model

## 2.8.0
##### 2023-04-08

- Added the languages table/model and its seeder (created ISO 639-1 languages)

## 2.7.1
##### 2023-03-31

- Fixed possible null access on garbled zone members in the db

## 2.7.0
##### 2023-03-12

- Added missing methods to the `Zone` interface (have been present in the implementation from v2.5)
- Added the `getMemberCountryIds()` and the `getMemberProvinceIds()` methods to the Zone class/interface
- Added the `ofType()` scope to the ZoneMember model
- Added `ZoneMember::getName()` both to the model and to the interface
- Changed the internal coding style to PSR-12 + Vanilo style 

## 2.6.0
##### 2023-03-10

- Added the `Zones::get()` method (to query zones without matching with country/province/address)

## 2.5.1
##### 2023-03-09

- Fixed the Zones query giving all results when passing an address with a province to it
- Fixed the old name of "Macedonia, the former Yugo..." by renaming it to "North Macedonia"

## 2.5.0
##### 2023-02-27

- Added zones with scopes (shipping, billing, etc) and members (province, country)
- Added `country`, `province` and `zone` models to the Relation morphMap
- Added the `Zones` query class (eg. `Zones::withShippingScope()->theCountryBelongsTo('CA')`)
- Added the provinces and territories of Canada seeder (English and French variants are separately available)

## 2.4.0
##### 2023-02-16

- Added Laravel 10 support

## 2.3.0
##### 2022-11-24

- Added PHP 8.2 support
- Dropped Laravel 8 support
- Changed minimum Laravel version to 9.2
- Allowing Doctrine DBAL v3

## 2.2.2
##### 2022-11-07

- Fixed UK to be non-EU in the Country Seeder

## 2.2.1
##### 2022-05-22

- Removed theatrical warnings from the streamline provinces' migrations down method

## 2.2.0
##### 2022-03-10

- Added Enum v4 support
- Dropped PHP 7.3 & 7.4 support
- Dropped Laravel 6 & 7 support

## 2.1.2
##### 2022-02-28

- Added PHP 8.1 and Laravel 9 support
- Fixed some model annotations
- Replaced Travis CI with GitHub Actions

## 2.1.1
##### 2021-11-05

- Fixed SQLite incompatibility in downwards migration

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
