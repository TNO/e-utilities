ESummary
========

Returns document summaries (DocSums) for a list of input UIDs.

Basic example
-------------

Create an instance of the ESummary object and an ESummary Query object. ::

    $summary = new ESummary\ESummary();
    $query = new ESummary\Query();
    $query->setUids([
        15718680,
        157427902
    ]);
    $search = $summary->execute($query);

The summary is created, a query object is created.
The query object for ESummary is simpler then it's ESearch brother. This query can only handle uid's.
So there is no query builder for this one.
Simply add the uid's via an array with ::

    $query->setUids([]);

Or add a single uid via ::

    $query->addUid();

And then execute the query with the ESummary object ::

    $summary->execute($query);


The result will look something like this. ::

    {
        "header": {
            "type": "esummary",
            "version": "0.3"
        },
        "result": {
            "uids": [
                "15718680"
            ],
            "15718680": {
                "uid": "15718680",
                "caption": "NP_005537",
                "title": "tyrosine-protein kinase ITK/TSK [Homo sapiens]",
                "extra": "gi|15718680|ref|NP_005537.3|",
                "gi": 15718680,
                "createdate": "1999/06/09",
                "updatedate": "2018/06/23",
                "flags": 512,
                "taxid": 9606,
                "slen": 620,
                "biomol": "",
                "moltype": "aa",
                "topology": "linear",
                "sourcedb": "refseq",
                "segsetsize": "",
                "projectid": "0",
                "genome": "genomic",
                "subtype": "chromosome|map",
                "subname": "5|5q33.3",
                "assemblygi": "",
                "assemblyacc": "D13720.1",
                "tech": "",
                "completeness": "",
                "geneticcode": "1",
                "strand": "",
                "organism": "human",
                "strain": "",
                "statistics": [
                    {
                        "type": "all",
                        "count": 7
                    },
                    {
                        "type": "blob_size",
                        "count": 26835
                    }
                ],
                "properties": {
                    "aa": "2",
                    "value": "2"
                },
                "oslt": {
                    "indexed": true,
                    "value": "NP_005537.3"
                },
                "accessionversion": "NP_005537.3"
            }
        }
    }


ESummary parameters
-------------------

The ESummary can be changed
