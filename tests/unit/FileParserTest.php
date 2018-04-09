<?php

class FileParserTest extends \PHPUnit\Framework\TestCase
{
    private $fileParser;

    public function setUp()
    {
        $this->fileParser = new FileParser();
    }

    public function testRawDataIsExtractedFromAValidFile()
    {
        $filePath = __DIR__ . "/resources/fileParser/test-file-1.log";

        $file = $this->fileParser->parseFile($filePath);

        $this->assertInstanceOf(File::class, $file);

        $rows = $file->getRawDataRows();
        $this->assertEquals(2, count($rows));

        $this->assertEquals("New Appcode", $rows[0]->getAppCode());
        $this->assertEquals("token1", $rows[0]->getDeviceToken());
        $this->assertEquals("1", $rows[0]->getDeviceTokenStatus());
        $this->assertEquals("active_is\n", $rows[0]->getTags());

        $this->assertEquals("Another Appcode", $rows[1]->getAppCode());
        $this->assertEquals("token2", $rows[1]->getDeviceToken());
        $this->assertEquals("0", $rows[1]->getDeviceTokenStatus());
        $this->assertEquals("active_not\n", $rows[1]->getTags());
    }

    /**
     * @expectedException EmptyFileException
     */
    public function testExceptionIsThrownWhenFileIsEmpty()
    {
        $filePath = __DIR__ . "/resources/fileParser/test-file-empty.log";

        $this->fileParser->parseFile($filePath)->getRawDataRows();
    }

    /**
     * @expectedException FileNotFoundException
     */
    public function testExceptionIsThrownWhenFileIsNotFound()
    {
        $filePath = __DIR__ . "/resources/fileParser/test-file-not-found.log";

        $this->fileParser->parseFile($filePath)->getRawDataRows();
    }
}