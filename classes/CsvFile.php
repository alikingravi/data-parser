<?php

class CsvFile
{
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
     * @return mixed
     */
    public function getFilePath()
    {
        return $this->filePath;
    }

    /**
     * @return mixed
     */
    public function getCsvDataRows()
    {
        return $this->csvDataRows;
    }
}
