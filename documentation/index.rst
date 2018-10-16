.. e-utilities documentation master file, created by
   sphinx-quickstart on Mon Oct 15 14:26:54 2018.
   You can adapt this file completely to your liking, but it should at least
   contain the root `toctree` directive.

Welcome to E-utilities's documentation!
=======================================

This documentation will serve as a guide on how to use the E-utilites php library.
It will not thoroughly discuss the NCBI E-utilities itself.


.. toctree::
   :maxdepth: 2
   :glob:

   Installation/*
   Usage/*
   Utilities/*

E-Utilities
-----------

NCBI has created a HTTP API to query data against their databases. There are a few different utilities you can use.
The details for every utility is decribed `here`__.

__ https://www.ncbi.nlm.nih.gov/books/NBK25499/

Current state of the php library
--------------------------------

At this point in time I've implemented the calls to perform an ESearch call and an ESummary call

API Key
-------
As of december 2018 NCBI requires the usage of an api key. `You can create one here`__.

__ https://www.ncbi.nlm.nih.gov/account/settings/

Once you've got an api key, add it in your .env file and call it NCBI_API_KEY


Indices and tables
==================

* :ref:`genindex`
* :ref:`modindex`
* :ref:`search`
