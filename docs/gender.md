# Gender

Gender is an [enum](https://github.com/artkonekt/enum) and is used by the [Person](person.md) model.

The following types are supported out of the box:

| Type    | Stored As | Notes                                                                                                                          |
|:--------|:----------|:-------------------------------------------------------------------------------------------------------------------------------|
| UNKNWON | NULL      | (default) if the value is unset/null it returns as UNKNOWN, see [Nullable Enums](https://artkonekt.github.io/enum/#/nullables) |
| FEMALE  | 'f'       |                                                                                                                                |
| MALE    | 'm'       |                                                                                                                                |

If you want to extend this (eg.
[third sex](http://www.independent.co.uk/news/world/europe/germany-third-gender-male-female-intersex-court-parliament-bundesverfassungsgericht-berlin-lgbt-a8043261.html))
list see [Extending Enums](https://konekt.dev/concord/1.3/enums#extending-enums) in Concord's
documentation.
