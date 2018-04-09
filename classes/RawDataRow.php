<?php

/**
 * Class RawDataRow
 */
class RawDataRow
{
    /**
     * Class variables
     */
    private $appCode;
    private $deviceToken;
    private $deviceTokenStatus;
    private $tags;

    /**
     * RawDataRow constructor.
     * @param $appCode
     * @param $deviceToken
     * @param $deviceTokenStatus
     * @param $tags
     */
    public function __construct($appCode, $deviceToken, $deviceTokenStatus, $tags)
    {
        $this->appCode = $appCode;
        $this->deviceToken = $deviceToken;
        $this->deviceTokenStatus = $deviceTokenStatus;
        $this->tags = $tags;
    }

    /**
     * Getter for app code
     *
     * @return mixed
     */
    public function getAppCode()
    {
        return $this->appCode;
    }

    /**
     * Getter for device token
     *
     * @return mixed
     */
    public function getDeviceToken()
    {
        return $this->deviceToken;
    }

    /**
     * Getter for token status
     *
     * @return mixed
     */
    public function getDeviceTokenStatus()
    {
        return $this->deviceTokenStatus;
    }

    /**
     * Getter for tags
     *
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }
}
