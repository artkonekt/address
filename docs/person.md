# Person

**Table**: `persons`

### Fields

| Name      | Type                             | Details                                  |
|:----------|:---------------------------------|:-----------------------------------------|
| id        | autoinc                          |                                          |
| firstname | string                           |                                          |
| lastname  | string                           |                                          |
| email     | string                           | [opt]                                    |
| phone     | string(22)                       | [opt]                                    |
| birthdate | date                             | [opt]                                    |
| gender    | enum, [Gender](gender.md)        | [opt]                                    |
| nin       | string(21)                       | [opt] National Identification Number     |
| nameorder | enum, [NameOrder](name-order.md) | western: First Last, eastern: Last First |



