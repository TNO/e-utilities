=======
ESearch
=======

With `ESearch`_ we can query the database and retrieve a list of UIDs matching a text query.

.. _ESearch: https://www.ncbi.nlm.nih.gov/books/NBK25499/#chapter4.ESearch

Basic example
=============

The following example will display a very simple query on ESearch.

.. code::

    $queryBuilder = new ESearch\QueryBuilder();
    $queryBuilder->addTerm('medication')->addTerm('asthma');
    $query = $queryBuilder->getQuery();
    $eSearch = new ESearch\ESearch();
    $result = $eSearch->execute($query);

    return $result;

What is happening here?
First we create an object ESearch\QueryBuilder. This object allows us to add terms to the search query.

Once the object is instantiated, we can add terms to it. ::

    ->addTerm('medication')

Now the query builder has added a term to the query. ::

    ->addTerm('asthma')

Another term is added to the query. ::

    $query = $queryBuilder->getQuery();

The query object is retrieved. ::

    $eSearch = new ESearch\ESearch();

An ESearch object is created. ::

    $result = $eSearch->execute($query);

And finally the result is retrieved by executing the eSearch with the query we created.

Which gives a result similar to this: ::

    {
        "header": {
            "type": "esearch",
            "version": "0.3"
        },
        "esearchresult": {
            "count": "1097404",
            "retmax": "4",
            "retstart": "1",
            "idlist": [
                "30317691",
                "30317644",
                "30317624",
                "30317418"
            ],
            "translationset": [
                {
                    "from": "medication[All Fields]",
                    "to": "\"pharmaceutical preparations\"[MeSH Terms] OR (\"pharmaceutical\"[All Fields] AND \"preparations\"[All Fields]) OR \"pharmaceutical preparations\"[All Fields] OR \"medication\"[All Fields]"
                },
                {
                    "from": "asthma",
                    "to": "\"asthma\"[MeSH Terms] OR \"asthma\"[All Fields]"
                }
            ],
            "translationstack": [
                {
                    "term": "\"pharmaceutical preparations\"[MeSH Terms]",
                    "field": "MeSH Terms",
                    "count": "734915",
                    "explode": "Y"
                },
                {
                    "term": "\"pharmaceutical\"[All Fields]",
                    "field": "All Fields",
                    "count": "444221",
                    "explode": "N"
                },
                {
                    "term": "\"preparations\"[All Fields]",
                    "field": "All Fields",
                    "count": "251040",
                    "explode": "N"
                },
                "AND",
                "GROUP",
                "OR",
                {
                    "term": "\"pharmaceutical preparations\"[All Fields]",
                    "field": "All Fields",
                    "count": "53577",
                    "explode": "N"
                },
                "OR",
                {
                    "term": "\"medication\"[All Fields]",
                    "field": "All Fields",
                    "count": "217810",
                    "explode": "N"
                },
                "OR",
                "GROUP",
                {
                    "term": "\"asthma\"[MeSH Terms]",
                    "field": "MeSH Terms",
                    "count": "120570",
                    "explode": "Y"
                },
                {
                    "term": "\"asthma\"[All Fields]",
                    "field": "All Fields",
                    "count": "175187",
                    "explode": "N"
                },
                "OR",
                "GROUP",
                "OR"
            ],
            "querytranslation": "(\"pharmaceutical preparations\"[MeSH Terms] OR (\"pharmaceutical\"[All Fields] AND \"preparations\"[All Fields]) OR \"pharmaceutical preparations\"[All Fields] OR \"medication\"[All Fields]) OR (\"asthma\"[MeSH Terms] OR \"asthma\"[All Fields])",
            "errorlist": {
                "phrasesnotfound": [
                ],
                "fieldsnotfound": [
                ]
            }
        }
    }


ESearch parameters
==================

ESearch itself has multiple parameters that can change the result.

Currently these are the ones implemented in this library

* Return type (json or xml | Defaults to json)
* Result maximum (default 20)
* Result start (default 0)
* Database (default pubmed)

To change these in your application you can do the following. ::

    $eSearch = new ESearch\ESearch();
    $eSearch->setDatabase('differentDatabase')
        ->setReturnType('xml')
        ->setResultMaximum(500)
        ->setResultStart(15);

Now the parameters have changed an the request will be sent as such.
So in this case, the database we're querying is "differentDatabase", we'll be getting a maximum of 500 results with an
offset of 15 in XML format.
