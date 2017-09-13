# Country

**Table**: `countries`

### Fields

| Name         | Type    |
|--------------|---------|
| id           | char(2) |
| name         | string  |
| phonecode    | int     |
| is_eu_member | bool    |

### Relations

| Name      | Type                               | Returns                                                   |
|-----------|------------------------------------|-----------------------------------------------------------|
| provinces | [Province](province.md) collection | All the provinces of the country                          |
| states    | [Province](province.md) collection | The `state` [type](province-type.md) provinces of the country |
| counties    | [Province](province.md) collection | The `county` [type](province-type.md) provinces of the country |

### Seeders

The `Konekt\Address\Seeds\Countries` with all the world's countries.

Refer to the [seeders](seeders.md) section for more details.
