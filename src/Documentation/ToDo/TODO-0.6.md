# TO DO LIST FOR 0.6.*

## Comparator identification

When calling `identifyValue()` on a `DataValueObject`, it should be possible to supply a comparator. If no
comparator is supplied, then "=" is used.

## Multi-value identification

When calling `identifyValue()` on a `DataValueObject`, it should be possible to supply a `Collection` of
values, along with a boolean comparator (e.g. IN, NOT IN, OR, AND).