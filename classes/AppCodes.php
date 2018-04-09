<?php

class AppCodes
{
    private $ini_array;

    /**
     * AppCodes constructor.
     */
    public function __construct($appCodesFilePath)
    {
        $this->ini_array = parse_ini_file($appCodesFilePath);
    }

    public function getCode($value)
    {
        $key = array_search($value, $this->ini_array);

        if (!$key) {
            throw new AppCodeNotFoundException();
        }

        return $key;
    }
}