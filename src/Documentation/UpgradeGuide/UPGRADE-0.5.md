UPGRADE FROM 0.x to 0.5
===

### Namespace changes

All of the namespaces under `Circle314\ ` have been moved to `Circle314\Component\ `
with the exception of `Circle314\Concept\ ` which retains it's namespace.

If you are using Circle314 Framework version 0.4.*, these are the suggested steps
for fixing your code base to adhere to the new namespacing convention:

 * Backup your codebase in whatever fashion suits you (Git branch, file backup, etc.)
 * From your project src directory, search for `Circle314\ ` and replace with `Circle314\Component\ `
 * From your project src directory, search for `Circle314\Component\Concept\ ` and replace with `Circle314\Concept\ `
 * Run any tests on your code base to ensure the fix has been applied without issue
 
This should be all that is required in order to update your references to Circle314 classes.

### Export of core dependencies to independent packages

As of v0.5 we are commencing an extrication of core dependencies to independent packages.
This means that from hereon in, the Circle314 framework will transition from being a monolithic library
to being a composition of independent libraries, each of which have their own dependency tree (if required).
If you are familiar with Zend Framework, it is similar to how they structure their principal library. Unlike
Symfony, individual components will no longer form part of the core code base of the main framework.

The first tranche of changes involves extrication of the packages `Concept`, `Collection`, and `Type`.
Those packages are now listed as required components in the `composer.json` file for Circle314, and
can be found in the following GitHub locations:

| Package | Location
| --- | ---
| Concept | https://github.com/circle314/concept.git
| Collection | https://github.com/circle314/collection.git
| Type | https://github.com/circle314/type.git

### Components that are deprecated

The following components are deprecated after being deemed unfit for purpose. Reasons may include that they
do not comply with PHP PSRs, do not comply with SOLID principles, or are anaemic and better replaced with a
third party library. For this reason, it is strongly recommended **not** to reference these components in your
code base at all:

 * Authentication (*anaemic, better third party libraries exist*)
 * IO (*non-compliant with PSR-7*)
 * ParameterSet (*non-compliant with PSR-7*)

### Components slated for full overhaul

The following components will undergo full overhaul in a future version of Circle314, which may include breaking
changes to namespaces and/or interfaces. For this reason, it is strongly recommended **not** to reference these
components in your code base unless you are fully prepared to upgrade/fix these references by hand in future:

 * ErrorLogging (*non-compliant with PSR-3*)
 * FileLocator (*unhappy with abstractions being tied to HTML and JS*)
 * RenderableObject (*bad hybrid of newables and injectables*)
 * Renderer (*unhappy with abstractions being tied to HTML and JS*)
 * Session (*feels too dictatorial in the way it is handling session variables - what benefits are there for end users?*)

### Components slated for major change

The following components will undergo major change in a future version of Circle314. Every effort will be made to
remain backwards compatible, but there may be breaking changes to namespaces and/or interfaces. For this reason,
it is recommended to only use these components if you are prepared to undertake manual fixes to your codebase (these
fixes will be fully explained in upgrade documentation):

 * Data (*very susceptible to data integrity loss through rollbacks and race conditions, unstable in applications that are more than one user*)
 * Modelling (*very susceptible to data integrity loss through rollbacks and race conditions, unstable in applications that are more than one user*)
 * Schema (*plans for all identification, ordering, and filtering ORM operations to reside somewhere else, to neaten things up*)

### Components that are ready for use

The following components are in alpha stage, and should remain relatively stable in terms of namespacing and interfaces.
There may be some breaking changes, but these will be accompanied by minor version releases and upgrade documentation:

 * Collection
 * Encoding
 * Encryption
 * ErrorHandling
 * Exception
 * ExceptionHandling
 * Hash
 * ShutdownHandling
 * Type
