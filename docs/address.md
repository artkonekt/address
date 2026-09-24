# Address

**Table**: `addresses`

### Fields

| Name            | Type                                  | Details                                                                                         |
|:----------------|:--------------------------------------|:------------------------------------------------------------------------------------------------|
| id              | autoinc                               |                                                                                                 |
| type*           | enum, [Address Type](address-type.md) | AddressType (optional)                                                                          |
| name            | string                                | The name on the address (person/org)                                                            |
| firstname       | string                                | The first (given) name of the addressed person                                                  |
| lastname        | string                                | The last (family) name of the addressed person                                                  |
| company_name    | string                                | The name of the addressed company/organization                                                  |
| registration_nr | string                                | The registration number of the addressee                                                        |
| tax_nr          | string                                | The registration number of the addressee                                                        |
| country_id      | char(2)                               | fk -> `countries`                                                                               |
| province_id     | int                                   | The province the address belongs to (optional)                                                  |
| postalcode      | string(12)                            | National identification code. (optional) [Why 12](http://stackoverflow.com/a/29280718/1016746)? |
| city            | string                                | The city/settlement (optional)                                                                  |
| address         | string (384)                          | The address details (street, nr, building, etc)                                                 |
| address2        | string                                | Additional address details                                                                      |
| access_code     | string                                | Code for accessing the address (locker code, door code, etc)                                    |
| notes           | string                                | Notes for the address, like access instructions for the delivery person                         |
| email           | string                                | E-mail address for the given pysical address (eg. for notifications)                            |
| phone           | string                                | Phone number for the given pysical address (eg. for contacting)                                 |


> *: type is really optional, you may completely omit using it, or decide
> to use set on another level,
> eg.: using a pivot table like `client_shipping_addresses`

### Relations

| Name     | Type                            | Returns                             |
|:---------|:--------------------------------|:------------------------------------|
| country  | [Country](country.md)           | The country the address belongs to  |
| province | [Province](province.md) \| null | The province the address belongs to |
