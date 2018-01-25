CHANGE LOG FOR 0.6
===

# Overview

The 0.6 upgrade involves extracting out various parts of the Data, Schema, and Modelling components
so that data artifacts can be passed around easier, and that they support polymorphism in a more succinct
and SOLID compliant manner.

In 0.5, the concepts of a data object and data transfer object are too tightly coupled, as are
model factories and data mediators. Ideally, a data object should only know about it's fields, their
names, types, values, whether those fields have changed, and whether they are being used to identify,
order, or otherwise alter the retrieval or storage of the data at the external source (if one exists).
Schemas, unfortunately, have not only this information but also information on how they are stored.
This means that in 0.5, Schemas are tightly coupled to their data storage and retrieval strategy -
it would be preferable if we could swap out the external data source/target from file system, to
database, to API, etc. The changes in 0.6 hope to address this.

To ease the transition from old components to new replacement components, a folder named `Transitional`
has been created housing various transitional interfaces that work with both old and new classes, as
well as services that consume them.

The following components are now deprecated and will be removed in a future version, likely 0.7:

* Data\Mediator (_replaced by `Data\Persistence\Strategy`_)
* Data\Operation (_replaced by `Data\Persistence\Operation`_)
* Modelling (_replaced by `Data\TransferObject`, see migration notes below_)
* Schema (_replaced by `Data\Entity`, see migration notes below_)

### New Features

The sub-components `Data\Entity` and `Data\ValueObject` have been introduced to replace the now deprecated
sub-components `Schema` and `Schema\SchemaField`. Classes that implement this interface should also implement
methodology to dictate which CRUD operations are legal. (_See `Data\Persistence\Strategy\AbstractPersistenceStrategy`
for examples_)

`PersistenceStrategy` objects are intended to negotiate with the external persistence entity, whether that be
a database, file system, API, or other external data stream. Any configuration, optionality, or other persistence-specific
attribute or methods should go in these classes. To aid in creation of these classes, two abstract classes have been created
that contain almost all necessary functionality, with remaining functionality declared as abstract methods:
`Data\Persistence\Strategy\AbstractPersistenceStrategy` and `Data\Persistence\Strategy\Database\AbstractDatabasePersistenceStrategy`.

### New Functions

`PersistenceStrategyInterface` introduces a new function `isLessVolatileThan($volatility)`. This is intended to be
used when attempting to determine whether to use cached database results or fresh retrievals.

`OperationMediatorInterface` now has four new methods that allow "forgetting" of cached results, each method allowing
forgetting at different levels of granularity:

* `forgetEnvironment(CallInterface $call)` - Removes all cached responses for an environment
* `forgetEndPoint(CallInterface $call)` - Removes all cached responses for an end point (i.e. database table / view)
* `forgetQuery(CallInterface $call)` - Removes all cached responses for a query
* `forgetResponse(CallInterface $call)` - Removes an individual cached response

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

# Migrating from 0.5 to 0.6

### Moving away from Models

Models are being removed because they were only really there to allow lazy loading via closures, which is not
a very good design pattern. If you rely on the lazy loading aspects of Models, it is suggested you either bring
that code into your application code base or, ideally, use a more robust pattern such as DDD.

### Moving from Schemas to DataEntities
 
The transition from `Schemas`/`SchemaFields` to `DataEntites`/`DVOs`
(Data Value Objects) is quite painless. All functionality is exactly the same, except for the data-source/target
knowledge, which has instead placed in `Data\Persistence\Strategy\PersistenceStrategyInterface`. See
`Data\Persistence\Strategy\AbstractPersistenceStrategy` for CRUD operation availability methods you would
normally find in `SchemaInterface`. Those methods are now protected, as it is now unnecessary for outside classes
to access them.

### Moving from Mediators to PersistenceStrategies

PersistenceStrategies are almost identical to Data Mediators in terms of the interface. The key differences are:

* PersistenceStrategies do not have a `clearTableCache()` method
* PersistenceStrategies include an `isLessVolatileThan($volatility)` method

Aside from those methods, nothing really changes here, and it should all work nicely between the old and new classes.

### General setup for Data objects in 0.6

For each persistence mechanism (e.g. database) your application should have one concrete class for each of the following:

* Accessor
* OperationRepository

For each end point (e.g. table) your application should have one concrete class for each of the following:

* Entity
* EntityRepository
* EntityFactory
* PersistenceStrategy

...and optionally...

* EntityCollection