# TO DO LIST FOR 0.7

## Filtering via Operators

When calling `identifyValue($value)` on a `DataValueObject`, it adds a filter to the parent `DataEntity` during
SQL execution using `=` and the value provided. This functionality should be extended to allow other operators
to be passed via a method called `addFilterRule()`, so that they can be used in conjunction (e.g. `>=12` combined
with `<15`). Initially, these filters should be combined using the `AND` conjoiner. *(See Filter Grouping below,
for future functionality improvements).*

## Row-level locking during data retrieval

It should be possible to declare a row-level lock when using the `DataEntityRepositoryInterface` methods
`retrieve`, `retrieveID`, and `retrieveCollection`. This is probably better placed in the `Data\Persistence`
classes, so it has to be determined where this functionality will be accessible from, and where it will
be defined.

## Introduce OO sources and targets in Persistence Strategies

Currently, `AbstractDatabasePersistenceStrategy` extends `AbstractPersistenceStrategy` to implement the `get()`,
`delete()`, and `save()` methods, creating their own methods around schema names and table names in order for
concrete implementations to point to the correct source and target database objects. This is very restrictive in
that it only allows these operations to be made against tables and views. It doesn't allow source and target
objects to be table-valued functions or stored procedures, which are entirely legitimate, and often used to
achieve faster query IO. The database persistence strategy should be improved to allow varied database objects
types to be targeted when the base operations `get()`, `delete()`, and `save()` are called. *(See also Execution
of Stored Procedures below, for future functionality improvements).*

# FUTURE TO DO LIST

## Filter Grouping

When calling `identifyValue()` on a `DataValueObject`, it should be possible to supply a group (read: `Collection`)
of filters, along with a boolean comparator to "join" them together (e.g. OR, AND, XOR). This group should
allow disparate `ValueObjects` to be passed, so that you can create clauses such as `WHERE ("typeID" = 5 OR
"statusID" = 2)`. In this case, it would be a group of `"typeID" = 5` and `"statusID" = 2` combined using
the `OR` conjoiner.

Additionally, it should be possible to hierarchically build theses groups by providing similar groups, so that
clauses such as `WHERE (("typeID" = 5 OR "statusID" = 2) AND "isDeleted" = FALSE)` can be created. In this
case, the outermost clause would be a group of the aforementioned group and `"isDeleted" = FALSE`,
combined using the `AND` conjoiner.

## Execution of Stored Procedures

There are times when an application must execute a Stored Procedure either as a standalone function call, or as a
proxy for an `INSERT`, `UPDATE`, or `DELETE` operation (yet returning no dataset result(s)). It should be possible
to create objects outside the traditional CRUD operation Repository paradigm, that allows developers to call Stored
Procedures whilst leveraging the functionality of the various supporting classes in the Data Component.