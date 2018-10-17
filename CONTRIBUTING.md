# Contributing

To make this library easier to maintain here are some requirements for contributing.

* For features and bugfixes always make sure there is an issue, if not create one.
* Make your commit messages clear and to the point.
  * Prefix your commit message with, BUGFIX, TEST, FEAT, DOCS or IMPROV.
  * When it is a bugfix, do not say what you've done, say what error it fixed in the message, describe your solution in the body
  * example: 
      ```
      BUGFIX: Call to ESearch always returns a 403 response
      
      When trying to create a default query to ESearch every reponse was a 403.
      This is caused due to the api key requirement since december.
      Updated the base request to always include the api key set in the .env file
      ```
