<?php
declare(strict_types=1);

namespace LarsNieuwenhuizen\EUtilities\Tests\Unit\ESummary;

use LarsNieuwenhuizen\EUtilities\ESummary\Query;
use PHPUnit\Framework\TestCase;

class QueryTest extends TestCase
{

    /**
     * @var Query
     */
    protected $subject;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->subject = new Query();
        parent::setUp();
    }

    /**
     * @test
     */
    public function getUidsReturnsSetUids(): void
    {
        $test = [1, 2, 3];
        $this->subject->setUids($test);
        $this->assertEquals($test, $this->subject->getUids());
    }

    /**
     * @test
     */
    public function addUidAddsASingleUidToTheExistingUids(): void
    {
        $test = [1, 2, 3];
        $this->subject->setUids($test);
        $this->subject->addUid(4);
        $this->assertEquals([1, 2, 3, 4], $this->subject->getUids());
    }

    /**
     * @test
     */
    public function getQueryStringReturnsTheUidString(): void
    {
        $test = [1,2,3];
        $this->subject->setUids($test);
        $this->assertEquals('1,2,3', $this->subject->getQueryString());
    }
}
