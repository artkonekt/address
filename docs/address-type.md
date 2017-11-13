# Address Type

Address type is an [enum](https://github.com/artkonekt/enum) and is used by the [Address](address.md) model.

The following types are supported out of the box:

| Type        | Meaning                                                                    |
|-------------|----------------------------------------------------------------------------|
| undefined   | NULL, (default) if no type is set                                          |
| billing     | To display on Invoices                                                     |
| business    | At which a business is located                                             |
| contract    | Aka legal address: that is the registered address of a person/organization |
| mailing     | To which (physical) correspondence should be sent                          |
| pickup      | At which items should be picked up                                         |
| residential | Where a person lives                                                       |
| shipping    | To which goods should be delivered                                         |

If you want to extend this list for your application refer to [Extending Enums](https://artkonekt.github.io/concord/#/enums?id=extending-enums) in Concord's documentation.

