[![Build Status](https://travis-ci.org/LarsNieuwenhuizen/e-utilities.svg?branch=master)](https://travis-ci.org/LarsNieuwenhuizen/e-utilities)
[![Maintainability](https://api.codeclimate.com/v1/badges/def68975006c01cd7fb3/maintainability)](https://codeclimate.com/github/LarsNieuwenhuizen/e-utilities/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/def68975006c01cd7fb3/test_coverage)](https://codeclimate.com/github/LarsNieuwenhuizen/e-utilities/test_coverage)
[![StyleCI](https://styleci.io/repos/132768838/shield?branch=master)](https://styleci.io/repos/132768838)
[![Latest Stable Version](https://poser.pugx.org/larsnieuwenhuizen/e-utilities/v/stable)](https://packagist.org/packages/larsnieuwenhuizen/e-utilities)
[![Latest Unstable Version](https://poser.pugx.org/larsnieuwenhuizen/e-utilities/v/unstable)](https://packagist.org/packages/larsnieuwenhuizen/e-utilities)
[![License](https://poser.pugx.org/larsnieuwenhuizen/e-utilities/license)](https://packagist.org/packages/larsnieuwenhuizen/e-utilities)
[![Documentation Status](https://readthedocs.org/projects/e-utilities/badge/?version=latest)](https://e-utilities.readthedocs.io/en/latest/?badge=latest)

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

## Current state of this library

The implemented objects usable at this moment are:

* [EInfo](https://e-utilities.readthedocs.io/en/latest/Utilities/EInfo.html)
* [ESearch](https://e-utilities.readthedocs.io/en/latest/Utilities/ESearch.html)
* [ESummary](https://e-utilities.readthedocs.io/en/latest/Utilities/ESummary.html)

Details are in the documentation

### API Key

As of december 2018 NCBI requires the usage of an api key. 
You can create one [here](https://www.ncbi.nlm.nih.gov/account/settings/).

Once you've got an api key, add it in your .env file and call it `NCBI_API_KEY`

### Note
Not all pararmeters NCBI supports are implemented in the objects. These will be implemented in time.
For the current state either take a look in the code. Or check the documentation later this year.
I'll try to work on it as much as I can.

The details for the separate EUtility objects and there usage can be found in the documentation.
