<?php

/**
 * Class CsvDataRow
 */
class CsvDataRow
{
    /**
     * Class variables
     */
    private $id;
    private $appCode;
    private $deviceId;
    private $contactable;
    private $subscriptionStatus;
    private $hasDownloadedFreeProductStatus;
    private $hasDownloadedIapProductStatus;

    /**
     * CsvDataRow constructor.
     * @param $id
     * @param $appCode
     * @param $deviceId
     * @param $contactable
     * @param $subscriptionStatus
     * @param $hasDownloadedFreeProductStatus
     * @param $hasDownloadedIapProductStatus
     */
    public function __construct($id, $appCode, $deviceId, $contactable, $subscriptionStatus, $hasDownloadedFreeProductStatus, $hasDownloadedIapProductStatus)
    {
        $this->id = $id;
        $this->appCode = $appCode;
        $this->deviceId = $deviceId;
        $this->contactable = $contactable;
        $this->subscriptionStatus = $subscriptionStatus;
        $this->hasDownloadedFreeProductStatus = $hasDownloadedFreeProductStatus;
        $this->hasDownloadedIapProductStatus = $hasDownloadedIapProductStatus;
    }

    /**
     * Getter for id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Getter for appCode
     *
     * @return mixed
     */
    public function getAppCode()
    {
        return $this->appCode;
    }

    /**
     * Getter for deviceId
     *
     * @return mixed
     */
    public function getDeviceId()
    {
        return $this->deviceId;
    }

    /**
     * Getter for contactable
     *
     * @return mixed
     */
    public function getContactable()
    {
        return $this->contactable;
    }

    /**
     * Getter for subscription status
     *
     * @return mixed
     */
    public function getSubscriptionStatus()
    {
        return $this->subscriptionStatus;
    }

    /**
     * Getter for free product status
     *
     * @return mixed
     */
    public function getHasDownloadedFreeProductStatus()
    {
        return $this->hasDownloadedFreeProductStatus;
    }

    /**
     * Getter for iap product status
     *
     * @return mixed
     */
    public function getHasDownloadedIapProductStatus()
    {
        return $this->hasDownloadedIapProductStatus;
    }

    /**
     * Returns an entire row as string
     *
     * @return string
     */
    public function toCsv()
    {
        $csvRow = $this->id . "," . $this->appCode . "," . $this->deviceId . "," . $this->contactable . "," . $this->subscriptionStatus . "," . $this->hasDownloadedFreeProductStatus . "," . $this->hasDownloadedIapProductStatus . "\n";

        return $csvRow;
    }
}