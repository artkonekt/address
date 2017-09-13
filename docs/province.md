# Province

**Table**: `provinces`

### Fields

| Name         | Type       | Details                      |
|--------------|------------|------------------------------|
| id           | autoinc    |                              |
| country_id   | char(2)    | fk -> countries              |
| type         | string     |                              |
| code         | string(16) | National identification code |
| name         | string     | -                            |

### Relations

| Name    | Type                  | Returns                             |
|---------|-----------------------|-------------------------------------|
| country | [Country](country.md) | The country the province belongs to |

### Enums

The `type` field is backed with the [ProvinceType](province-type.md) enum.

### Seeders

The package contains several province/state seeders for various countries.

For more details refer to the [seeders](seeders.md) section for more details.