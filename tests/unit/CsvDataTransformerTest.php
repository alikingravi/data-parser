<?php

class CsvDataTransformerTest extends \PHPUnit\Framework\TestCase
{
    public function testDataIsTransformed()
    {
        $data1 = new RawDataRow(
            'Classic Rock Prog',
            'token1',
            '1',
            'active_subscriber'
        );
        $data2 = new RawDataRow(
            'Gathered by Mollie Makes',
            'token2',
            '0',
            'active_subscriber|downloaded_free_product_unknown'
        );

        $rows = [$data1, $data2];

        $file = new File("/test", $rows);
        $appCodesFilePath = __DIR__ . "/resources/appCode/appCodes.ini";

        $csvDataTransformer = new CsvDataTransformer(new AppCodes($appCodesFilePath));
        $csvFile = $csvDataTransformer->transform($file);

        $this->assertEquals(2, count($csvFile->getCsvDataRows()));

        $this->assertEquals('classic-rock-prog', $csvFile->getCsvDataRows()[0]->getAppCode());
        $this->assertEquals('token1', $csvFile->getCsvDataRows()[0]->getDeviceId());
        $this->assertEquals(true, $csvFile->getCsvDataRows()[0]->getContactable());
        $this->assertEquals('active_subscriber', $csvFile->getCsvDataRows()[0]->getSubscriptionStatus());
        $this->assertEquals('', $csvFile->getCsvDataRows()[0]->getHasDownloadedFreeProductStatus());
        $this->assertEquals('', $csvFile->getCsvDataRows()[0]->getHasDownloadedIapProductStatus());


        $this->assertEquals('gathered-by-mollie-makes', $csvFile->getCsvDataRows()[1]->getAppCode());
        $this->assertEquals('token2', $csvFile->getCsvDataRows()[1]->getDeviceId());
        $this->assertEquals(false, $csvFile->getCsvDataRows()[1]->getContactable());
        $this->assertEquals('active_subscriber', $csvFile->getCsvDataRows()[1]->getSubscriptionStatus());
        $this->assertEquals('downloaded_free_product_unknown', $csvFile->getCsvDataRows()[1]->getHasDownloadedFreeProductStatus());
        $this->assertEquals('', $csvFile->getCsvDataRows()[1]->getHasDownloadedIapProductStatus());

    }
}