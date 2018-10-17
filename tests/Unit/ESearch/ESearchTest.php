<?php
declare(strict_types=1);

namespace LarsNieuwenhuizen\EUtilities\ESearch\Tests\ESearch;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Stream;
use LarsNieuwenhuizen\EUtilities\ESearch\ESearch;
use LarsNieuwenhuizen\EUtilities\ESearch\Query;
use LarsNieuwenhuizen\EUtilities\Tests\Unit\ESearch\ESearchDummy;
use PHPUnit\Framework\TestCase;

class ESearchTest extends TestCase
{

    /**
     * @var ESearch
     */
    protected $subject;

    /**
     * @throws \Exception
     * @return void
     */
    public function setUp(): void
    {
        $this->subject = new ESearch();
        parent::setUp();
    }

    /**
     * @test
     */
    public function getReturnTypeReturnsSetType(): void
    {
        $this->subject->setReturnType('xml');
        $this->assertEquals('xml', $this->subject->getReturnType());
    }

    /**
     * @test
     */
    public function getDatabaseReturnsSetDatabase(): void
    {
        $this->subject->setDatabase('testing');
        $this->assertEquals('testing', $this->subject->getDatabase());
    }

    /**
     * @test
     */
    public function getReturnMaximumReturnsSetMaximum(): void
    {
        $this->subject->setReturnMaximum(5016);
        $this->assertEquals(5016, $this->subject->getReturnMaximum());
    }

    /**
     * @test
     */
    public function getReturnStartReturnsSetReturnStart(): void
    {
        $this->subject->setReturnStart(10);
        $this->assertEquals(10, $this->subject->getReturnStart());
    }

    /**
     * @test
     */
    public function executeAddsAllNecessaryParametersToTheQuery(): void
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

    /**
     * @test
     */
    public function exceptionIsThrownWhenUrlPathIsConstantNotSet(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('URL path for utility not set');
        new ESearchDummy();
    }
}
