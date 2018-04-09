<?php

/**
 * Class CsvWriter
 */
class CsvWriter
{
    /**
     * Takes a csv file object and creates a new .csv file
     *
     * @param $csvFile
     */
    public function write($csvFile)
    {
        // Set file path
        $finalFilePath = $csvFile->getFilePath() . ".csv";

        // Delete the file if it already exists
        if (file_exists($finalFilePath)) {
            unlink($finalFilePath);
        }

        // Add header information to the file
        file_put_contents($finalFilePath, "id,appCode,deviceId,contactable,subscription_status,has_downloaded_free_product_status,has_downloaded_iap_product_status\n", FILE_APPEND | LOCK_EX);

        // Store all the rows in one string before writing the file. This is more memory efficient.
        $csvData = "";
        foreach ($csvFile->getCsvDataRows() as $row) {
                $csvData = $csvData . $row->toCsv();
        }

        // Write the file
        file_put_contents($finalFilePath, $csvData, FILE_APPEND | LOCK_EX);
    }
}
