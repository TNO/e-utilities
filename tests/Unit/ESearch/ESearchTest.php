<?php
declare(strict_types=1);

namespace LarsNieuwenhuizen\EUtilities\ESearch\Tests\ESearch;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Stream;
use LarsNieuwenhuizen\EUtilities\ESearch\ESearch;
use LarsNieuwenhuizen\EUtilities\ESearch\Query;
use PHPUnit\Framework\TestCase;

class ESearchTest extends TestCase
{

    /**
     * @var ESearch
     */
    protected $subject;

    /**
     * @return void
     */
    public function setUp()
    {
        $this->subject = new ESearch();
        parent::setUp();
    }

    /**
     * @test
     */
    public function getReturnTypeReturnsSetType()
    {
        $this->subject->setReturnType('xml');
        $this->assertEquals('xml', $this->subject->getReturnType());
    }

    /**
     * @test
     */
    public function getDatabaseReturnsSetDatabase()
    {
        $this->subject->setDatabase('testing');
        $this->assertEquals('testing', $this->subject->getDatabase());
    }

    /**
     * @test
     */
    public function getReturnMaximumReturnsSetMaximum()
    {
        $this->subject->setReturnMaximum(5016);
        $this->assertEquals(5016, $this->subject->getReturnMaximum());
    }

    /**
     * @test
     */
    public function getReturnStartReturnsSetReturnStart()
    {
        $this->subject->setReturnStart(10);
        $this->assertEquals(10, $this->subject->getReturnStart());
    }

    /**
     * @test
     */
    public function executeAddsAllNecessaryParametersToTheQuery()
    {
        $queryMock = $this->createMock(Query::class);
        $responseMock = $this->createMock(Response::class);
        $messageMock = $this->createMock(Stream::class);
        $httpClientMock = $this->getMockBuilder(Client::class)
            ->setMethods(['get'])
            ->getMock();

        $this->subject->setHttpClient($httpClientMock);

        $queryMock->expects($this->once())->method('getQueryString');
        $httpClientMock->expects($this->once())->method('get')->willReturn($responseMock);
        $responseMock->expects($this->once())->method('getBody')->willReturn($messageMock);
        $messageMock->expects($this->once())->method('getContents')->willReturn('{}');

        $this->subject->execute($queryMock);
    }
}
