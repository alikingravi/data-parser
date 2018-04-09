<?php

/**
 * Class AppCodes
 */
class AppCodes
{

    /**
     * @var array|bool
     */
    private $ini_array;

    /**
     * AppCodes constructor.
     */
    public function __construct($appCodesFilePath)
    {
        $this->ini_array = parse_ini_file($appCodesFilePath);
    }

    /**
     * Returns an app code key from a given string value
     *
     * @param $value
     * @return false|int|string
     * @throws AppCodeNotFoundException
     */
    public function getCode($value)
    {
        $key = array_search($value, $this->ini_array);

        if (!$key) {
            throw new AppCodeNotFoundException();
        }

        return $key;
    }
}