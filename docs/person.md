# Person

**Table**: `persons`

### Fields

| Name      | Type                             | Details                                   |
|:----------|:---------------------------------|:------------------------------------------|
| id        | autoinc                          |                                           |
| firstname | string                           |                                           |
| lastname  | string                           |                                           |
| email     | string                           | (optional)                                |
| phone     | string(22)                       | (optional)                                |
| birthdate | date                             | (optional)                                |
| gender    | enum, [Gender](gender.md)        | (optional)                                |
| nin       | string(21)                       | (optional) National Identification Number |
| nameorder | enum, [NameOrder](name-order.md) | western: First Last, eastern: Last First  |
