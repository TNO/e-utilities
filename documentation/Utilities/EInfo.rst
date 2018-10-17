EInfo
=====

Provides a list of the names of all valid Entrez databases

Basic example
-------------

This object is very simple. Is only lists names of databases. The only real parameter here is the database.
So this object doesn't require a query object.

So all you need to do in this case is: ::

    $eInfo = new EInfo();
    $result = $eInfo->execute();

The database defaults to pubmed.
The result will look something like this: ::

    {
      "header": {
        "type": "einfo",
        "version": "0.3"
      },
      "einforesult": {
        "dbinfo": {
          "dbname": "pubmed",
          "menuname": "PubMed",
          "description": "PubMed bibliographic record",
          "dbbuild": "Build181016-2212m.1",
          "count": "28963682",
          "lastupdate": "2018/10/17 03:25",
          "fieldlist": [
            {
              "name": "ALL",
              "fullname": "All Fields",
              "description": "All terms from all searchable fields",
              "termcount": "206572927",
              "isdate": "N",
              "isnumerical": "N",
              "singletoken": "N",
              "hierarchy": "N",
              "ishidden": "N",
              "istruncatable": "Y",
              "israngable": "N"
            },
        ]
      }
    }

EInfo parameters
----------------

EInfo has a few parameters.

* Database (defaults to pubmed)
* Version (defaults to '2.0')
* Return type (defaults to json)

To change these simple use the object setters: ::

    $eInfo = new EInfo();
    $result = $eInfo->setDb('otherDatabase')
        ->setVersion('1.0')
        ->setReturnType('xml')
        ->execute();

And now the result will be changed accordingly.
