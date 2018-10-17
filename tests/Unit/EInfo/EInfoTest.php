<?php
declare(strict_types=1);

namespace LarsNieuwenhuizen\EUtilities\Tests\Unit\EInfo;

use LarsNieuwenhuizen\EUtilities\EInfo\EInfo;
use PHPUnit\Framework\TestCase;

class EInfoTest extends TestCase
{

    /**
     * @var EInfo
     */
    protected $subject;

    /**
     * @return void
     */
    protected function setUp()
    {
        $this->subject = new EInfo();
        parent::setUp();
    }

    /**
     * @test
     */
    public function getDbReturnsSetDb()
    {
        $this->subject->setDb('testDb');
        $this->assertEquals('testDb', $this->subject->getDb());
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

//    public function
}
