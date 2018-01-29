CHANGE LOG FOR 0.7
===

# Overview

The 0.7 update involves removing the components deprecated in 0.6, deprecating the Authentication
and ParameterSet Components, and enhancing a lot of the functionality in the Data Component.

The Authentication and ParameterSet Components are not being replaced with new components. There are
notes at the bottom of this document on what to do to migrate effectively away from their use.

### Backward Incompatible Changes

In `DatabaseConfigurationInterface`, `MySQLDatabaseConfiguration` and `PostgreSQLDatabaseConfiguration`,
`identifierParameterPrefix()` has been renamed to `filterParameterPrefix()`.

In `AbstractConstants`, the static function `hasConstant($constantValue)` has been deprecated in lieu of
the static function `hasConstantValue($constantValue)`, which performs identically.

In `DatabaseAccessorInterface`, the functions `generateDeleteQuery()`, `generateInsertQuery()`,
`generateSelectQuery()`, and `generateUpdateQuery()` all took three arguments: `DataEntityInterface $dataEntity`,
`string $schemaName`, and `string $tableName`. The second and third arguments have been removed, and replaced
with the argument `DatabaseObjectInterface $databaseObject`. This forms part of the transition to `PersistenceObjects`.
See Migrating to PersistenceObjects below in the migration notes for instructions on how to migrate your code.

Also in `DatabaseAccessorInterface` (and `AbstractDatabaseAccessor`), the method `getFullyQualifiedTableName()`
has been completely removed as it is no longer used by any of the framework code, and should not be used by
any custom extensions.

### Changed Functions

`ResponseInterface` has changed the return type of the `result()` method from `array` to `mixed`. Determination of the
actual return type is now a responsibility of implementation.

### New Components

#### PersistenceObjects, source and target

In `DatabaseAccessors`, the framework is moving away from the use of `sourceSchema()`, `sourceTable()`, `targetSchema()` and
`targetTable()`, as these restrict database activity to interactions with only tables and views. There are plans for future versions
of the framework to incorporate access to parameterised views and stored procedures, and as such `PersistenceObjects` have been
introduced. This will lead to a much richer and more robust set of interactive functionality with databases and, eventually, other
persistence mechanisms (i.e. files, APIs, etc.)  For full instructions on how to migrate to `PersistenceObjects`, see Migrating
to PersistenceObjects in the migration notes below.

### New Functions

#### Filtering via Operators

Up to and including v0.6 the only filtering available when passing a `DataEntity` to a `DataEntityRepository`
during CRUD operations has been equality against a value. It is now possible to pass an `Operator` along with a
value, by using the `addFilterRule(OperatorInterface $operator, mixed $value)` function provided in `DVOInterface`
and implemented in `AbstractDVO`.

Currently implemented `Operators` (which all reside in the namespace `Circle314\Component\Data\Operator\Native`) are:

 * `EqualToOperator`
 * `GreaterThanOperator`
 * `GreaterThanOrEqualToOperator`
 * `LessThanOperator`
 * `LessThanOrEqualToOperator`
 * `NotEqualToOperator`

Example usage, where we only want to include results where `myDataValueField` is greater than or equal to `5` is:

    $filteringDataEntity = $dataEntityRepository->createBlank();
    $filteringDataEntity->myDataValueField()->addFilterRule(
        new GreaterThanOrEqualToOperator(),
        5
    );
    $retrievedDataEntities = $dataEntityRepository->retrieve($filteringDataEntity);
    
Note that the traditional method of identification via `identifyValue($value)` still works, though now delegates
to the `addFilterRule()` function for implementation. As such, the following code:
    
    $filteringDataEntity = $dataEntityRepository->createBlank();
    $filteringDataEntity->myDataValueField()->identifyValue(7);
    $retrievedDataEntities = $dataEntityRepository->retrieve($filteringDataEntity);

...is equivalent to this code:

    $filteringDataEntity = $dataEntityRepository->createBlank();
    $filteringDataEntity->myDataValueField()->addFilterRule(
        new EqualToOperator(),
        7
    );
    $retrievedDataEntities = $dataEntityRepository->retrieve($filteringDataEntity);

Also important to note is that `Operators` are configured to either accept or reject `null` values passed. If an
`Operator` cannot accept a `null` value, it will throw an `Exception`. Currently, the only `Operators` that can accept
a `null` value are `EqualToOperator` and `NotEqualToOperator`. To determine whether an `Operator` accepts `null` values
or not, you can call the function `OperatorInterface::acceptsNullValues():bool)`.

#### Locking for update when retrieving Data Entities

It is now possible to create locks `FOR UPDATE` when submitting a `DataEntity` to a `Repository` under a `get()` operation.
The syntax is:

    $filteringDataEntity = $dataEntityRepository->createBlank();
    $filteringDataEntity->ID()->addFilterRule(new EqualToOperator(), 5);
    $filteringDataEntity->lockForUpdate();
    $dataEntity = $dataEntityRepository->retrieveCollection($dataEntity);

This is equivalent to writing a SQL statement in the form:

    SELECT ... FOR UPDATE

It is important to note that PostgreSQL does not allow locking on views that utilise window functions
(aka OLAP functions), and will throw an `Exception` if you attempt to use a `retrieve*()` after using
a `lockForUpdate()` on one of these views.

#### Skipping locked data

Is it now possible to skip locked data when submitting a `DataEntity` to a `Repository` under a `get()` operation.
The syntax is:

    $filteringDataEntity = $dataEntityRepository->createBlank();
    $filteringDataEntity->ID()->addFilterRule(new EqualToOperator(), 5);
    $filteringDataEntity->skipLockedData();
    $dataEntity = $dataEntityRepository->retrieveCollection($dataEntity);

This is equivalent to writing a SQL statement in the form:

    SELECT ... SKIP LOCKED

This functionality can be used in conjunction with the locking for update functionality described above.

It is important to note that this is currently only implemented for PostrgeSQL. MySQL has no equivalent
command in it's flavour of SQL syntax, so future implementation on that platform is highly unlikely.

### Deprecated Components

The following components are now deprecated and will be removed in a future version, likely 0.8
_(for migration strategies, see Migrating from 0.6 to 0.7 below)_:

* Authentication (_no replacement provided_)
* ParameterSet (_no replacement provided_)

### Deprecated Functions

In `DVOInterface`, the internal functions `identifiedValue()` and `isMarkedAsIdentifier()` are deprecated, in lieu of
the new Filtering via Operators functionality (see above, in New Functions).

In `DataEntityInterface` and `AbstractDataEntity`, the function `fieldsMarkedAsIdentifiers()` is deprecated, in lieu of
the new Filtering via Operators functionality (see above, in New Functions).

In `AbstractDatabasePersistenceStrategy`, the functions `sourceSchema()`, `sourceTable()`, `targetSchema()` and
`targetTable()` are removed from the `abstract protected` functions, and should no longer be used. Instead, developers
should populate the `abstract protected` functions `persistenceSource()` and `persistenceTarget()`. See Migrating to
PersistenceObjects, in the section Migrating from 0.6 to 0.7 below.

### Removed Components

The following components are removed _(for migration strategies, see CHANGELOG-0.6 Migration Notes)_:

* Data\Mediator (_replaced by `Data\Persistence\Strategy`_)
* Data\Operation (_replaced by `Data\Persistence\Operation`_)
* Modelling (_replaced by `Data\Entity`, see CHANGELOG-0.6 Migration Notes_)
* Schema (_replaced by `Data\Entity`, see CHANGELOG-0.6 Migration Notes_)

### Removed Functions

In `AbstractDVO`, the protected functions `markAsIdentifier()` and `unmarkAsIdentifier()` have been
removed. These are internal functions, even though they hadn't been marked as such.

### Other Changes

*None*

# Migrating from 0.6 to 0.7

### Handling Backwards Incompatible Changes

Search through your application for any classes that implement `DatabaseConfigurationInterface` and that call
the function `identifierParameterPrefix()`. Replace these with calls to the function `filterParameterPrefix()`.

Search through your application for any classes that extend `AbstractConstants` and that call the function
`hasConstant()`. Replace these with calls to the function `hasConstantValue()`.

### Handling Deprecated Functions

Search through your application for any classes that implement `DVOInterface`, do not extend `AbstractDVO` and
also implement the function `isMarkedAsIdentifier()`. Either alter these classes to extend `AbstractDVO` or,
alternately, read the section under New Functions above about Filtering via Operators, and adjust your class to
adhere to them. An example of Filtering via Operators implementation can be found in `AbstractDVO`, though you
can safely extend that abstract class to leverage core functionality.

Search through your application for any classes that implement `DataEntityInterface`, do not extend `AbstractDataEntity`
and also implement the function `fieldsMarkedAsIdentifiers()`. Either alter these classes to extend `AbstractDataEntity`
or, alternately,  read the section under New Functions above about Filtering via Operators, and adjust your class
to adhere to them. An example of Filtering via Operators implementation can be found in `AbstractDVO`, though you can
safely extend that abstract class to leverage core functionality.

### Handling Removed Functions

There should be no reason for users to have called the functions `markAsIdentifier()` and `unmarkAsIdentifier()`
in extensions of `AbstractDVO`, but if you have, then you will need to migrate your class extension to use Filtering
via Operators instead. `AbstractDVO` contains core functionality that handles this automatically for you. If in doubt,
read the section under New Functions above about Filtering via Operators.

### Migrating to PersistenceObjects

In the past, `DatabasePersistenceStrategies` have utilised the functions `sourceSchema()`, `sourceTable()`, `targetSchema()`
and `targetTable()` for identification of source and target database objects. This restricts the database object types to
tables and views, which is very restrictive considering many database engines support parameterised views and stored
procedures. As such, the functions `persistenceSource()` and `persistenceTarget()` have been introduced to alleviate this
stricture.

A typical `DatabasePersistenceStrategy` would ordinarily look something like this:

    class UserPersistenceStrategy extends AbstractDatabasePersistenceStrategy
    {
        protected function sourceSchema(): ?string
        {
            return 'mySchema';
        }
    
        protected function sourceTable(): ?string
        {
            return 'userView';
        }
    
        protected function targetSchema(): ?string
        {
            return 'mySchema';
        }
    
        protected function targetTable(): ?string
        {
            return 'user';
        }
    }
    
This format will no longer work in v0.7 of the framework. For the above example, we would now use the following code:

    class UserPersistenceStrategy extends AbstractDatabasePersistenceStrategy
    {
        protected function persistenceSource(): DatabaseObjectInterface
        {
            return new NativeDatabaseViewObject('mySchema', 'userView');
        }
    
        protected function persistenceTarget(): DatabaseObjectInterface
        {
            return new NativeDatabaseTableObject('mySchema', 'user');
        }
    }
    
Not only is this far more succinct, it also allows the framework to provide native database object types in future versions,
that represent parameterised queries, stored procedures, and any other exotic interfaces that a database may provide.

Changes have already been made to the native providers `MySQLDatabaseAccessor` and `PostgreSQLDatabaseAccessor` which will
give developers a seamless experience when transitioning their `DatabasePersistenceStrategies`. If, on the other hand, you have
rolled your own `DatabaseAccessor` by extending off the `AbstractDatabaseAccessor` there are a few important things to note:

 - The `abstract public` functions `generateDeleteQuery()`, `generateInsertQuery()`, `generateSelectQuery()`, and
 `generateUpdateQuery` now take a `DatabaseObjectInterface` as their second argument (instead of a string), and the third
 argument is completely dropped.
 - Changes in the `MySQLDatabaseAccessor` and `PostgreSQLDatabaseAccessor` implementation of those functions has simply
 been swapping out references to `$this->delimitedFullyQualifiedTableName($schemaName, $tableName)` with
 `$databaseObject->resolvedName($this)`.
 
### Replacing the Authentication Component

The Circle314 Authentication Component was an anaemic and rather naive implementation of LDAP authentication, and wasn't really
future ready. Developers are welcome to rip the code out from the 0.6 codebase and continue using it by incorporating it in
their private codebase if they wish. I would recommend doing some research and rolling your own authentication service though,
as LDAP connection and authentication solutions are made quite easy by native PHP code (see
[this StackOverflow post](https://stackoverflow.com/questions/171519/authenticating-in-php-using-ldap-through-active-directory)
for an example)

There are no current plans to resurrect the Authentication Component.

### Replacing the ParameterSet Component

The Circle314 ParameterSet Component was intended to provide a mutable copy of the superglobals `$_GET`, `$_SERVER`, etc. This was
a somewhat naive implementation and was made without knowledge of [PSR-7](http://www.php-fig.org/psr/psr-7/). As Circle314 is aiming
to be compliant with the PSRs, this component is being dropped.

There are excellent PSR-7 compliant packages out there that expose the superglobals safely, two of the more popular and well respected
ones being [Zend Diactoros](https://zendframework.github.io/zend-diactoros/) and [Guzzle](http://docs.guzzlephp.org/en/stable/). If you
do not wish to use a PSR-7 compliant HTTP messaging interface, you could migrate your code to access the superglobals directly,
though I do not recommend this.

There are no current plans to resurrect the ParameterSet Component. In the future, Circle314 *may* provide a PSR-7 compliant HTTP
messaging interface, but given the pedigree of Diactoros and Guzzle, it is unlikely to be a high priority any time soon.

