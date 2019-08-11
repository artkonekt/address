# Country

**Table**: `countries`

### Fields

| Name         | Type    |
|--------------|---------|
| id           | char(2) |
| name         | string  |
| phonecode    | int     |
| is_eu_member | bool    |

The country id is aimed to be the [ISO 3166-1 alpha-2](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2)
country code.

### Relations

| Name        | Type                               | Returns                                                           |
|:------------|:-----------------------------------|:------------------------------------------------------------------|
| provinces   | [Province](province.md) collection | All the provinces of the country (any subtype                     |
| states      | [Province](province.md) collection | The `state` [type](province-type.md) provinces of the country     |
| counties    | [Province](province.md) collection | The `county` [type](province-type.md) provinces of the country    |
| regions     | [Province](province.md) collection | The `region` [type](province-type.md) provinces of the country    |
| territories | [Province](province.md) collection | The `territory` [type](province-type.md) provinces of the country |
| units       | [Province](province.md) collection | The `unit` [type](province-type.md) provinces of the country      |

### Seeders

The `Konekt\Address\Seeds\Countries` with all the world's countries.

Refer to the [seeders](seeders.md) section for more details.
