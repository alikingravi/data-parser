<?php

class RawDataRow
{
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
     * @return mixed
     */
    public function getAppCode()
    {
        return $this->appCode;
    }

    /**
     * @return mixed
     */
    public function getDeviceToken()
    {
        return $this->deviceToken;
    }

    /**
     * @return mixed
     */
    public function getDeviceTokenStatus()
    {
        return $this->deviceTokenStatus;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }
}
