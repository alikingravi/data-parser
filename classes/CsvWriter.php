<?php

class CsvWriter
{
    public function write($csvFile)
    {
        $finalFilePath = $csvFile->getFilePath() . ".csv";

        if (file_exists($finalFilePath)) {
            unlink($finalFilePath);
        }

        file_put_contents($finalFilePath, "id,appCode,deviceId,contactable,subscription_status,has_downloaded_free_product_status,has_downloaded_iap_product_status\n", FILE_APPEND | LOCK_EX);

        $csvData = "";
        foreach ($csvFile->getCsvDataRows() as $row) {
                $csvData = $csvData . $row->toCsv();
        }

        file_put_contents($finalFilePath, $csvData, FILE_APPEND | LOCK_EX);
    }
}
