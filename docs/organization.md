# Organization

This model was intended to store data entries of **companies**,
governments, NGOs, institutes (eg. school), charities, etc - ie.
organizations.

**Table**: `organizations`

### Fields

| Name            | Type       | Details                                                                                               |
|:----------------|:-----------|:------------------------------------------------------------------------------------------------------|
| id              | autoinc    |                                                                                                       |
| name            | string     |                                                                                                       |
| tax_nr          | string(17) | Tax/VAT Identification Number, see [Wikipedia](https://www.wikiwand.com/en/VAT_identification_number) |
| registration_nr | string(16) | eg. Company/Trade Registration Number                                                                 |
| email           | string     | [opt]                                                                                                 |
| phone           | string(22) | [opt]                                                                                                 |

