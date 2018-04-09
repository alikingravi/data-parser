<?php

/**
 * Class FilePathFinderTest
 */
class FilePathFinderTest extends \PHPUnit\Framework\TestCase
{

    /**
     * Stores the instance of FilePathFinder Class
     * @var
     */
    private $filePathFinder;

    /**
     * Setup function
     */
    public function setup()
    {
        $this->filePathFinder = new FilePathFinder();
    }

    /**
     *  Tests whether file paths are returned from a given directory
     */
    public function testFilePathsAreReturnedFromGivenDirectory()
    {
        $directory = __DIR__ . "/resources/filePathFinder/";

        $files = $this->filePathFinder->findFiles($directory);

        $testArray = [
            $directory . "test-file-12.log",
            $directory . "folder1/test-file-1.log",
            $directory . "folder2/test-file-2.log",
        ];

        $this->assertEquals(sort($testArray), sort($files));
    }

    /**
     *  If a directory does not exist then no files should be returned
     *  @expectedException InvalidDirectoryException
     */
    public function testNoFileReturnedWhenDirectoryDoesNotExist()
    {
        $directory = __DIR__ . "/resources/filePathfder/";

        $this->filePathFinder->findFiles($directory);
    }
}