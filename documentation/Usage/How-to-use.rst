How to use
==========

This page will describe the objects available and the concept on how to use them.

The abstract base
-----------------

The base configuration for every EUtility object (like ESearch) is defined in an abstract base class.
Here settings are defined like:

* Base url
* Url path (is set per individual EUtility)
* API key
* HTTP Client (Guzzle)

Every EUtility object extends from this abstract class.

EUtility- & Query interface
---------------------------

The idea is that every E-Utility NCBI has created, I've created a php counterpart object for.
There is an interface called EUtility. Every class representing an E-Utility will implement this interface.
And the interface currently defines that an execute method has to be available and has to process an object implementing the Query interface.

Use an EUtility
---------------

To use an EUtility simply instantiate the object referring to the EUtility you need.
So for example, if you want to use ESearch, you can do this:

.. code::

    $eSearch = new ESearch\ESearch();

ESearch implements EUtilityInterface, so this object now has the method execute() available.
execute requires a query object.
Every EUtility will have it's own query object implementing the Query interface.

The Query interface defines that a method `getQueryString(): string` has to be available, meant to return the string created used for the query.

Building a Query
----------------

To execute an EUtility a Query object has to be created.
For the more complex query objects a QueryBuilder will be created.
For the simpler query objects one can just create a new instance of the needed query.

If a QueryBuilder is available the query builder object will have a method `getQuery()` to return the needed query object.

ESearch example (with QueryBuilder):

.. code::

    $queryBuilder = new ESearch\QueryBuilder();
    $query = $queryBuilder->getQuery();
    $eSearch = new ESearch\ESearch();
    $eSearch->execute($query);

ESummary example (without QueryBuilder):

.. code::

    $query = new ESummary\Query();
    $eSummary = new ESummary\ESummary();
    $eSummary->execute($query);

