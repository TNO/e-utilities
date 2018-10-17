<?php
declare(strict_types=1);

namespace LarsNieuwenhuizen\EUtilities\Tests\Unit\ESummary;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Stream;
use LarsNieuwenhuizen\EUtilities\ESummary\ESummary;
use LarsNieuwenhuizen\EUtilities\ESummary\Query;
use PHPUnit\Framework\TestCase;

class ESummaryTest extends TestCase
{

    /**
     * @var ESummary
     */
    protected $subject;

    /**
     * @throws \Exception
     * @return void
     */
    protected function setUp(): void
    {
        $this->subject = new ESummary();
        parent::setUp();
    }

    /**
     * @test
     */
    public function getDatabaseReturnsSetDatabase()
    {
        $this->subject->setDatabase('pubmed');
        $this->assertEquals('pubmed', $this->subject->getDatabase());
    }

    /**
     * @test
     */
    public function getReturnTypeReturnsSetReturnType()
    {
        $this->subject->setReturnType('xml');
        $this->assertEquals('xml', $this->subject->getReturnType());
    }

    /**
     * @test
     */
    public function getVersionReturnsSetVersion()
    {
        $this->subject->setVersion('1.0');
        $this->assertEquals('1.0', $this->subject->getVersion());
    }

    /**
     * @test
     */
    public function executeReturnsTheHttpResult()
    {
        $queryMock = $this->createMock(Query::class);
        $responseMock = $this->createMock(Response::class);
        $messageMock = $this->createMock(Stream::class);
        $httpClientMock = $this->getMockBuilder(Client::class)
            ->setMethods(['get'])
            ->getMock();

        $this->subject->setHttpClient($httpClientMock);

        $httpClientMock->expects($this->once())->method('get')->willReturn($responseMock);
        $responseMock->expects($this->once())->method('getBody')->willReturn($messageMock);
        $messageMock->expects($this->once())->method('getContents')->willReturn('{}');
        $queryMock->expects($this->once())->method('getQueryString');

        $this->subject->execute($queryMock);
    }
}
