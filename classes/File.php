<?php

/**
 * Class File
 */
class File
{

    /**
     * Class variables
     */
    private $filePath;
    private $rawDataRows;

    /**
     * File constructor
     *
     * @param $filePath
     * @param $rawDataRows
     */
    public function __construct($filePath, $rawDataRows)
    {
        $this->filePath = $filePath;
        $this->rawDataRows = $rawDataRows;
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
     * Getter for raw data rows
     *
     * @return mixed
     */
    public function getRawDataRows()
    {
        return $this->rawDataRows;
    }
}