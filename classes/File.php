<?php

class File
{
    private $filePath;
    private $rawDataRows;

    /**
     * File constructor.
     * @param $filePath
     * @param $rawDataRows
     */
    public function __construct($filePath, $rawDataRows)
    {
        $this->filePath = $filePath;
        $this->rawDataRows = $rawDataRows;
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
    public function getRawDataRows()
    {
        return $this->rawDataRows;
    }
}