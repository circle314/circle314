CHANGE LOG FOR 0.6
===

# Overview

The 0.6 upgrade involves extracting out various parts of the Data, Schema, and Modelling components
so that they mesh better with DDD, and support polymorphism in a more succinct and SOLID compliant
manner.

In 0.5, the concepts of a data object and data transfer object are too tightly coupled, as are
model factories and data mediators. Ideally, a data object should only know about it's fields, their
names, types, values, whether those fields have changed, and whether they are being used to identify,
order, or otherwise alter the retrieval or storage of the data at the external source (if one exists).
Schemas, unfortunately, have not only this information but also information on how they are stored.
This means that in 0.5, Schemas are tightly coupled to their data storage and retrieval strategy -
it is preferable that we can swap out the external data source/target from file system, to database,
to API, etc. The changes in 0.6 hope to address this.

To ease the transition from old components to new replacement components, and folder named `Transition`
has been created housing various transitional interfaces that work with both old and new classes.

The following components are now deprecated and will be removed in a future version, likely 0.7
_(for migration strategies, see Migration Notes below)_:

* Data\Mediator (_replaced by `Data\Persistence\Strategy`_)
* Data\Operation (_replaced by `Data\Persistence\Operation`_)
* Modelling (_replaced by `Data\TransferObject`, see migration notes below_)
* Schema (_replaced by `Data\Entity`, see migration notes below_)

### New Features

The sub-components `Data\Entity` and `Data\ValueObject` have been introduced to replace the now deprecated
sub-components `Schema` and `Schema\SchemaField`. The transition from `Schemas`/`SchemaFields` to `DataEntites`/`DVOs`
(Data Value Objects) is reasonably painless, but the data-source/target knowledge has been taken out of the
`Schema` classes and instead placed in `Data\Persistence\Strategy\PersistenceStrategyInterface`. Classes that
implement this interface should also implement methodology to dictate which CRUD operations are legal.

`PersistenceStrategy` objects are intended to negotiate with the external persistence entity, whether that be
a database, file system, API, or other external data stream. Any configuration, optionality, or other persistence-specific
attribute or methods should go in these classes. To aid in creation of these classes, two abstract classes have been created
that contain almost all necessary functionality, with remaining functionality declared as abstract methods:
`Data\Persistence\Strategy\AbstractPersistenceStrategy` and `Data\Persistence\Strategy\Database\AbstractDatabasePersistenceStrategy`.

### New Functions

`PersistenceStrategyInterface` introduces a new function `isLessVolatileThen($volatility)`. This is intended to be
used when attempting to determine whether to use cached database results or fresh retrievals.

`OperationMediatorInterface` now has four new methods that allow "forgetting" of cached results, each method allowing
forgetting at different granularity:

* forgetEndPoint(CallInterface $call);
* forgetEnvironment(CallInterface $call);
* forgetQuery(CallInterface $call);
* forgetResponse(CallInterface $call);

`CallInterface` has a new method `endPoint()`, which is used by the `OperationMediator` to determine which end point
to cache results against.

### Backward Incompatible Changes

*None*

### Deprecated Features

The following components are now deprecated and will be removed in a future version, likely 0.7
_(for migration strategies, see Migration Notes below)_:

* Data\Mediator (_replaced by `Data\Persistence\Strategy`_)
* Data\Operation (_replaced by `Data\Persistence\Operation`_)
* Modelling (_replaced by `Data\TransferObject`, see migration notes below_)
* Schema (_replaced by `Data\Entity`, see migration notes below_)

In `AbstractDatabaseAccessor`, the method `getFullyQualifiedTableName()` is now deprecated  in lieu of
`delimitedFullyQualifiedTableName`.



### Changed Functions

`ResponseInterface` has changed the return type of the `result()` method from `array` to `mixed`. Determination of the
actual return type is now a responsibility of implementation.

### Other Changes

Circle314 Type has changed its dependency on Circle314 Concept from v1.0 to v1.1. This incurs no backwards incompatible changes.
