<?php

/**
 * Class CsvDataTransformer
 */
class CsvDataTransformer
{
    /**
     * Class variables
     */
    private $appCodes;

    /**
     * CsvDataTransformer constructor.
     * @param AppCodes $appCodes
     */
    public function __construct(AppCodes $appCodes)
    {
        $this->appCodes = $appCodes;
    }

    /**
     * Takes a file object and returns a csv file object
     *
     * @param $file
     * @return CsvFile
     * @throws AppCodeNotFoundException
     */
    public function transform($file)
    {
        $count = 1;
        $csvDataRows = [];

        // Get all rows from $file
        $rawDataRows = $file->getRawDataRows();

        foreach ($rawDataRows as $rawDataRow) {

            $subscriptionStatus = "";
            $hasDownloadedFreeProductStatus = "";
            $hasDownloadedIapProductStatus = "";
            $validTags = TagGroup::extractValidTags($rawDataRow->getTags());

            if (array_key_exists('subscription_status', $validTags)) {
                $subscriptionStatus = $validTags['subscription_status'];
            }
            if (array_key_exists('has_downloaded_free_product_status', $validTags)) {
                $hasDownloadedFreeProductStatus = $validTags['has_downloaded_free_product_status'];
            }
            if (array_key_exists('has_downloaded_iap_product_status', $validTags)) {
                $hasDownloadedIapProductStatus = $validTags['has_downloaded_iap_product_status'];
            }

            $csvDataRow = new CsvDataRow(
                $count,
                $this->appCodes->getCode($rawDataRow->getAppCode()),
                $rawDataRow->getDeviceToken(),
                $rawDataRow->getDeviceTokenStatus() == 1 ? 'true' : 'false',
                $subscriptionStatus,
                $hasDownloadedFreeProductStatus,
                $hasDownloadedIapProductStatus
            );

            $csvDataRows[] = $csvDataRow;
            $count++;
        }

        return new CsvFile($file->getFilePath(), $csvDataRows);
    }
}