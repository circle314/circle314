CHANGE LOG FOR 0.8
===

# Overview

Version 0.8 is introducing an important concept of internal methods on classes. When a method is internal,
it will be PHPDOC'd with the `@internal` tag, and will also be prefixed with the underscore (_) character.

The 0.8 update also involves removing the components deprecated in 0.8 (`Authentication` and `ParameterSet`),
and incorporating some necessary backwards incompatible changes.

The Authentication and ParameterSet Components are not being replaced with new components. There are
notes at the bottom of this document on what to do to migrate effectively away from their use.

### Backward Incompatible Changes

#### DatabaseConfiguration classes constructor change

In the namespace `Circle314\Component\Data\Accessor\Database`, the class `AbstractDatabaseConfiguration`
used to take 5 arguments: `$uniqueAccessorName`, `$serverIP`, `$databaseName`, `$username`, `$password`.
It now takes 2 arguments, in this order: `string $uniqueAccessorName`, `Array $configurationParameters`.
The configuration parameters are a keyed array, with the available keys listed in the new class
`DatabaseConfigurationParameterConstants` in the same namespace.

See ***Migrating from 0.7 to 0.8*** below for instruction on how to migrate to the new format.

#### DatabaseConfiguration classes getter changes

The following methods on `DatabaseConfiguration` classes have had method name changes:

 - `getDatabaseName()` has changed to `databaseName()`
 - `getPassword()` has changed to `password()`
 - `getServerIP()` has changed to `serverIP()`
 - `getUsername()` has changed to `username()`
 
The new public method `serverPort()` has also been introduced.

These method changes are all already incorporated into the `DatabaseAccessor` code, so unless you have rolled your
own database accessor classes, you will not be impacted by the changes.
 
### Changed Functions

*None*

### New Components

#### LimitNumberOfResults on DataEntities used as query configurations
`DataEntityInterface` now includes the methods `limitNumberOfResults(int $limit, int $offset = 0): void` to allow
the user to attach limit/offset clauses when performing get operations.

Note that there are several supporting internal

### New Functions

*None*

### Deprecated Components

*None*

### Deprecated Functions

*None*

### Removed Components

The following components are removed _(for migration strategies, see CHANGELOG-0.7 Migration Notes)_:

* Authentication
* ParameterSet

### Removed Functions

*None*

### Other Changes

#### Introduction of widespread internal methods
Version 0.8 is introducing an important concept of internal methods on classes. When a method is internal,
it will be PHPDOC'd with the `@internal` tag, and will also be prefixed with the underscore (_) character.

This will be integrated piecemeal across the framework, with original methods being marked as `@deprecated`.
Note that any methods marked as `@internal` should never be used by applications implementing the framework -
if at some stage in the future, the PHP team implement [friend classes](https://wiki.php.net/rfc/friend-classes),
then all of the `@internal` methods
will have their scope altered appropriately (e.g. protected or private) with exposure only made to friend
classes. It is advisable to avoid using the `@internal` methods until such time as it is clear which classes
will have their functionality exposed via friendship.


# Migrating from 0.7 to 0.8

### Updating Database Configurations

This version changes the way database configurations are initialised, from being a series of ordered parameters in the
constructor to simply being two parameters: unique accessor name, and a `KeyedCollectionInterface` of keyed parameters.
The new parameter keys can be found in the class `Circle314\Component\Data\Accessor\Database\DatabaseConfigurationParametersConstants`,
and currently consist of the following:

    const _DATABASE_NAME = 'databaseName';
    const _DATE_FORMAT = 'dateFormat';
    const _DATETIME_FORMAT = 'dateTimeFormat';
    const _PASSWORD = 'password';
    const _SERVER_IP = 'serverIP';
    const _SERVER_PORT = 'serverPort';
    const _USERNAME = 'username';
    
Initialising a `*DatabaseConfiguration` now changes from this syntax:

    $databaseConfiguration = new PostgreSQLDatabaseConfiguration(
        'MyDBConnection',
        'localhost',
        'my_database',
        'my_username',
        'my_password'
    );
    $databaseConfiguration->setDateFormat('Y-m-d');
    $databaseConfiguration->setDateTimeFormat('Y-m-d H:i:s');
    
...to this...

    $databaseConfiguration = new PostgreSQLDatabaseConfiguration(
        'MyDBConnection',
        [
            DatabaseConfigurationParameterConstants::_SERVER_IP         => 'localhost',
            DatabaseConfigurationParameterConstants::_SERVER_PORT       => '5432',
            DatabaseConfigurationParameterConstants::_DATABASE_NAME     => 'my_database',
            DatabaseConfigurationParameterConstants::_USERNAME          => 'my_username',
            DatabaseConfigurationParameterConstants::_PASSWORD          => 'my_password',
            DatabaseConfigurationParameterConstants::_DATE_FORMAT       => 'Y-m-d',
            DatabaseConfigurationParameterConstants::_DATETIME_FORMAT   => 'Y-m-d H:i:s'
        ]
    );

This version also introduces the addition of port numbers as parameters in `AbstractDatabaseConfiguration`.
You will now need to include the port number of your database instance in the configuration instance (as shown above).

