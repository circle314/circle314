CHANGE LOG FOR 0.6
===

# Overview

The 0.7 update involves extracting out various parts of the Data, Schema, and Modelling components
so that data artifacts can be passed around easier, and that they support polymorphism in a more succinct
and SOLID compliant manner.

The following components are removed as of v0.7:

* Data\Mediator (_replaced by `Data\Persistence\Strategy`_)
* Data\Operation (_replaced by `Data\Persistence\Operation`_)
* Modelling (_replaced by `Data\TransferObject`, see migration notes in CHANGELOG-0.6_)
* Schema (_replaced by `Data\Entity`, see migration notes in CHANGELOG-0.6_)

The following components are now deprecated and will be removed in a future version, likely 0.8:

* Authentication (_no replacement provided_)
* ParameterSet (_no replacement provided_)

### New Features

*None*

### New Functions

*None*

### Backward Incompatible Changes

*None*

### Deprecated Features

The following components are now deprecated and will be removed in a future version, likely 0.8
_(for migration strategies, see Migration Notes below)_:

* Authentication (_no replacement provided_)
* ParameterSet (_no replacement provided_)

### Deprecated Functions

The static function `AbstractConstants::hasConstant($constantValue)` has been deprecated in lieu of
the static function `AbstractConstants::hasConstantValue($constantValue)`, which performs identically.

### Removed Features

The following components are removed _(for migration strategies, see CHANGELOG-0.6 Migration Notes)_:

* Data\Mediator (_replaced by `Data\Persistence\Strategy`_)
* Data\Operation (_replaced by `Data\Persistence\Operation`_)
* Modelling (_replaced by `Data\TransferObject`, see CHANGELOG-0.6 Migration Notes_)
* Schema (_replaced by `Data\Entity`, see CHANGELOG-0.6 Migration Notes_)

In `AbstractDatabaseAccessor`, the method `getFullyQualifiedTableName()` is removed in lieu of
`delimitedFullyQualifiedTableName()`.

### Changed Functions

`ResponseInterface` has changed the return type of the `result()` method from `array` to `mixed`. Determination of the
actual return type is now a responsibility of implementation.

### Other Changes

Circle314 Type has changed its dependency on Circle314 Concept from v1.0 to v1.1. This incurs no backwards incompatible changes.

# Migrating from 0.6 to 0.7

### Replacing the Authentication Component

Example Text

### Replacing the Parameter Set Component

Example Text
