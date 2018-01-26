# TO DO LIST FOR 0.7

## Comparator identification

When calling `identifyValue()` on a `DataValueObject`, it should be possible to supply an Operator. If no
Operator is supplied, then "=" is used as a default.

## Row-level locking during data retrieval

It should be possible to declare a row-level lock when using the `DataEntityRepositoryInterface` methods
`retrieve`, `retrieveID`, and `retrieveCollection`. This is probably better placed in the `Data\Persistence`
classes, so it has to be determined where this functionality will be accessible from, and where it will
be defined.

## Introduce OO sources and targets to Persistence Strategies

Currently, `AbstractDatabasePersistenceStrategy` extends `AbstractPersistenceStrategy` to implement the `get()`,
`delete()`, and `save()` methods, creating it's own methods around schema names and table names in order for
concrete implementations to point to the correct source and target database objects. This is very restrictive in
that it doesn't allow source and target objects to be table-valued functions or stored procedures. The database
persistence strategy should be improved to allow varied database objects types to be targeted when the base
operations `get()`, `delete()`, and `save()` are called.

# FUTURE TO DO LIST

## Multi-value identification

When calling `identifyValue()` on a `DataValueObject`, it should be possible to supply a `Collection` of
values, along with a boolean comparator (e.g. IN, NOT IN, OR, AND).