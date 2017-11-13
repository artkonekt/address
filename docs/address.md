# Address

**Table**: `addresses`

### Fields

| Name        | Type                                  | Details                                                                                    |
|:------------|:--------------------------------------|:-------------------------------------------------------------------------------------------|
| id          | autoinc                               |                                                                                            |
| type*       | enum, [Address Type](address-type.md) | [opt] AddressType                                                                          |
| name        | string                                | The name on the address (person/org)                                                       |
| country_id  | char(2)                               | fk -> countries                                                                            |
| province_id | int                                   | [opt] the province the address belongs to                                                  |
| postalcode  | string(12)                            | [opt] National identification code. [Why 12](http://stackoverflow.com/a/29280718/1016746)? |
| city        | string                                | [opt] The city/settlement                                                                  |
| address     | string (384)                          | The address details (street, nr, building, etc)                                            |

> *: type is really optional, you may completely omit using it, or decide
> to us set on another level,
> eg.: using a pivot table like `client_shipping_addresses`

### Relations

| Name     | Type                            | Returns                             |
|:---------|:--------------------------------|:------------------------------------|
| country  | [Country](country.md)           | The country the address belongs to  |
| province | [Province](province.md) \| null | The province the address belongs to |
