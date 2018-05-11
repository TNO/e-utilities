<?php

namespace LarsNieuwenhuizen\EUtilities\Esearch\Tests\ESearch;

use LarsNieuwenhuizen\EUtilities\Esearch\Query;
use LarsNieuwenhuizen\EUtilities\Esearch\Term;
use PHPUnit\Framework\TestCase;

class QueryTest extends TestCase
{

    /**
     * @var Query
     */
    protected $subject;

    /**
     * Test setup
     */
    public function setUp()
    {
        $this->subject = new Query();
        parent::setUp();
    }

    /**
     * @test
     */
    public function byDefaultTermsIsEmpty()
    {
        $this->assertEquals([], $this->subject->getTerms());
    }

    /**
     * @test
     */
    public function getTermsReturnsSetTerms()
    {
        $term = new Term('test', ['column']);
        $array = [$term];
        $this->subject->setTerms($array);

        $this->assertInternalType('array', $this->subject->getTerms());
        $this->assertEquals(1, count($this->subject->getTerms()));
        $this->assertInstanceOf(Term::class, $this->subject->getTerms()[0]);
        $this->assertEquals('test', $this->subject->getTerms()[0]->getTerm());
    }

    /**
     * @test
     */
    public function getQueryStringRemovesFirstClauseStringWithRegex()
    {
        $term = new Term('Hello world', []);
        $term2 = new Term('Hello universe', []);
        $term3 = new Term('Hello multiverse', ['first', 'second'], 'OR');
        $this->subject->addTerm($term);
        $this->subject->addTerm($term2);
        $this->subject->addTerm($term3);
        $queryString = $this->subject->getQueryString();
        $this->assertEquals('Hello world[]+AND+Hello universe[]+OR+Hello multiverse[first/second]', $queryString);
    }
}
