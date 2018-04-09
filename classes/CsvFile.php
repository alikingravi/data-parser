<?php

/**
 * Class CsvFile
 */
class CsvFile
{
    /**
     * Class variables
     */
    private $csvDataRows;
    private $filePath;

    /**
     * CsvFile constructor.
     * @param $filePath
     * @param $csvDataRows
     */
    public function __construct($filePath, $csvDataRows)
    {
        $this->csvDataRows = $csvDataRows;
        $this->filePath = $filePath;
    }

    /**
     * Getter for file path
     *
     * @return mixed
     */
    public function getFilePath()
    {
        return $this->filePath;
    }

    /**
     * Getter for csv data rows
     *
     * @return mixed
     */
    public function getCsvDataRows()
    {
        return $this->csvDataRows;
    }
}
