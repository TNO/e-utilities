<?php

use LarsNieuwenhuizen\EUtilities\ESearch\ESearch;
use LarsNieuwenhuizen\EUtilities\ESearch\QueryBuilder;

require_once "../vendor/autoload.php";

$dotenv = new \Dotenv\Dotenv('../');
$dotenv->load();

$search = new ESearch();
$qb = new QueryBuilder();
$qb->addTerm('protein');
$search = $search->execute($qb->getQuery());

print $search;
