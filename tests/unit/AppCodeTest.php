<?php

class AppCodeTest extends \PHPUnit\Framework\TestCase
{
    private $appCode;

    public function setUp()
    {
        $appCodesFilePath = __DIR__ . "/resources/appCode/appCodes.ini";
        $this->appCode = new AppCodes($appCodesFilePath);
    }

    public function testAppCodeIsReturnedFromStringValue()
    {
        $code = $this->appCode->getCode("Classic Rock Prog");

        $this->assertEquals("classic-rock-prog", $code);
    }

    /**
     * @expectedException AppCodeNotFoundException
     */
    public function testExceptionIsThrownIfAppCodeNotFound()
    {
        $this->appCode->getCode("Classic Rock Progasasdasda");
    }
}