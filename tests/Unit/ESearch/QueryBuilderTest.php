<?php
declare(strict_types=1);

namespace LarsNieuwenhuizen\EUtilities\ESearch\Tests\ESearch;

use LarsNieuwenhuizen\EUtilities\ESearch\Query;
use LarsNieuwenhuizen\EUtilities\ESearch\QueryBuilder;
use PHPUnit\Framework\TestCase;

class QueryBuilderTest extends TestCase
{

    /**
     * @test
     */
    public function creatingQueryBuilderInstantiatesDefaultQuery()
    {
        $queryBuilder = new QueryBuilder();
        $this->assertInstanceOf(Query::class, $queryBuilder->getQuery());
    }

    /**
     * @throws \Exception
     * @test
     */
    public function addingTermSuccessfullyAddsTermToQuery()
    {
        $queryBuilder = new QueryBuilder();
        $queryBuilder->addTerm('Test');
        $this->assertCount(1, $queryBuilder->getQuery()->getTerms());
        $term = $queryBuilder->getQuery()->getTerms()[0];
        $this->assertEquals('Test', $term->getTerm());
    }
}
