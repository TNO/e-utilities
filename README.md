[![Build Status](https://travis-ci.org/LarsNieuwenhuizen/e-utilities.svg?branch=master)](https://travis-ci.org/LarsNieuwenhuizen/e-utilities)
[![Maintainability](https://api.codeclimate.com/v1/badges/def68975006c01cd7fb3/maintainability)](https://codeclimate.com/github/LarsNieuwenhuizen/e-utilities/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/def68975006c01cd7fb3/test_coverage)](https://codeclimate.com/github/LarsNieuwenhuizen/e-utilities/test_coverage)
[![StyleCI](https://styleci.io/repos/132768838/shield?branch=master)](https://styleci.io/repos/132768838)
[![Latest Stable Version](https://poser.pugx.org/larsnieuwenhuizen/e-utilities/v/stable)](https://packagist.org/packages/larsnieuwenhuizen/e-utilities)
[![Latest Unstable Version](https://poser.pugx.org/larsnieuwenhuizen/e-utilities/v/unstable)](https://packagist.org/packages/larsnieuwenhuizen/e-utilities)
[![License](https://poser.pugx.org/larsnieuwenhuizen/e-utilities/license)](https://packagist.org/packages/larsnieuwenhuizen/e-utilities)

# E-Utilities

This php library is meant to serve as an abstraction layer to communicate with the [NCBI E-Utilities](https://www.ncbi.nlm.nih.gov/books/NBK25499/) using simple php objects.
The E-Utilities have a variation of different calls.

* EInfo
* ESearch
* EPost
* ESummary
* EFetch
* ELink
* EGQuery
* ESpell
* ECitMatch

More information on the in-depth details of the calls can be found [here](https://www.ncbi.nlm.nih.gov/books/NBK25501/)

---

## Current state of this library

At this point in time I've implemented the calls to perform an ESearch call and an ESummary call.

## How to use

### ESearch
The following example will display a very simple query on ESearch.
```php

$queryBuilder = new QueryBuilder();
$queryBuilder->addTerm('medication')->addTerm('asthma');
$query = $queryBuilder->getQuery();
$search = (new ESearch())->execute($query);

return $search;
```
The request uri built and sent to NCBI:

```
https://eutils.ncbi.nlm.nih.gov/entrez/eutils/esearch.fcgi?db=pubmed&retmode=json&term=medication+AND+asthma
```

The result will be something like:

```json
{
    "header": {
        "type": "esearch",
        "version": "0.3"
    },
    "esearchresult": {
        "count": "18448",
        "retmax": "20",
        "retstart": "0",
        "idlist": [
            "30317144",
            "30314518",
            "30307351",
            "30306750",
            "30304291",
            "30302951",
            "30291842",
            "30288952",
            "30288817",
            "30287588",
            "30286679",
            "30285499",
            "30282573",
            "30281581",
            "30281550",
            "30279128",
            "30275845",
            "30273709",
            "30273510",
            "30268426"
        ],
        "translationset": [
            {
                "from": "medication",
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
            "AND"
        ],
        "querytranslation": "(\"pharmaceutical preparations\"[MeSH Terms] OR (\"pharmaceutical\"[All Fields] AND \"preparations\"[All Fields]) OR \"pharmaceutical preparations\"[All Fields] OR \"medication\"[All Fields]) AND (\"asthma\"[MeSH Terms] OR \"asthma\"[All Fields])"
    }
}
```

### Editing the request
The objects can be manipulated to serve your needs.
In the last example you saw a simple request query being built using two terms.
The term string that the object built was `medication+AND+asthma`;
This string is used to search through all columns.

#### Search through specific columns?
```php
$queryBuilder->addTerm('medication', ['name'])->addTerm('asthma');
```

The object would now create:

```
https://eutils.ncbi.nlm.nih.gov/entrez/eutils/esearch.fcgi?db=pubmed&retmode=json&term=medication%5bname%5d+AND+asthma
```

Looks almost the same, but note the `term=medication%5bname%5d`.
Now it added the column as a condition.

#### AND or OR clauses?

We just saw the column being added as a condition in the query. But still we got `medication%5bname%5d+AND+asthma`
What if we need it to be OR?

Again simply use the method arguments like this:

```php
$queryBuilder->addTerm('medication', ['name'])->addTerm('asthma', [], 'OR');
```

Note the last addTerm, it doesn't add any column restrictions, but the third parameter changes to 'OR'.
Which in return results in the query string:
`&term=medication%5bname%5d+OR+asthma`.

### Change something in the ESearch settings

When you take a look at the ESearch object, you'll see the default database is set to pubmed. The return type is default set to json.
These can be changed if necessary.

Simply call the setters on the ESearch instance like so:

```php
$search = (new ESearch())->setReturnMode('xml')->execute($query);
```

And xml will be returned instead of json. Same goes for all available setters in the ESearch object.


### Note
Not all pararmeters NCBI supports are implemented in the objects. These will be implemented in time.
For the current state either take a look in the code. Or check the documentation later this year.
I'll try to work on it as much as I can.
