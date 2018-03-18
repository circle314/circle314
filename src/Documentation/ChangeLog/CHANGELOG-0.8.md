CHANGE LOG FOR 0.8
===

# Overview

The 0.8 update involves removing the components deprecated in 0.8 (`Authentication` and `ParameterSet`),
and incorporating some necessary backwards incompatible changes.

The Authentication and ParameterSet Components are not being replaced with new components. There are
notes at the bottom of this document on what to do to migrate effectively away from their use.

### Backward Incompatible Changes

#### Port declaration added to DatabaseConfiguration

In the namespace `Circle314\Component\Data\Accessor\Database`, the class `AbstractDatabaseConfiguration`
used to take 5 arguments: `$uniqueAccessorName`, `$serverIP`, `$databaseName`, `$username`, `$password`.
It now takes 6 arguments, in this order: `$uniqueAccessorName`, `$serverIP`, `$serverPort`, `$databaseName`,
`$username`, `$password`.

This change flows on to `MySQLDatabaseConnection`, and `PostgreSQLDatabaseConnection`, so ensure that you
check your instances of those classes and include the new port parameter. (MySQL generally runs on port 3306,
and PostgreSQL runs on port 5432 for <v10 and 5433 on v10).

### Changed Functions

*None*

### New Components

*None*

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

*None*

# Migrating from 0.7 to 0.8

### Updating Database Configurations to include port number

This version introduces the addition of port numbers as parameters in `AbstractDatabaseConfiguration`
(see Backward Incompatible Changes above). You will now need to include the port number of your database
instance in the configuration instance.

This change flows on to `MySQLDatabaseConnection`, and `PostgreSQLDatabaseConnection`, so ensure that you
check your instances of those classes and include the new port parameter. (MySQL generally runs on port 3306,
and PostgreSQL runs on port 5432 for <v10 and 5433 on v10).
