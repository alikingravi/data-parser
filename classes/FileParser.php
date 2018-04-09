<?php

/**
 * Class FileParser
 */
class FileParser
{
    /**
     * Opens and loops over a file, copies ever line and stores it to the file object
     *
     * @param $filePath
     * @return File
     * @throws EmptyFileException
     * @throws FileNotFoundException
     */
    public function parseFile($filePath)
    {
        if (file_exists($filePath)) {
            // Open the file
            $handle = fopen($filePath, "r");
            $counter = 0;
            $rawDataRows = [];
            $appCode = "";
            $deviceToken = "";
            $deviceStatus = "";
            $tags = "";

            if ($handle) {
                while (($line = fgets($handle)) !== false) {
                    $counter ++;
                    if ($counter == 1) {
                        continue;
                    }
                    $rawData = explode(',', $line);

                    if (isset($rawData[0])) {
                        $appCode = $rawData[0];
                    }
                    if (isset($rawData[1])) {
                        $deviceToken = $rawData[1];
                    }
                    if (isset($rawData[2])) {
                        $deviceStatus = $rawData[2];
                    }
                    if (isset($rawData[3])) {
                        $tags = $rawData[3];
                    }
                    $rawDataRows[] = new RawDataRow($appCode, $deviceToken, $deviceStatus, $tags);
                }
                fclose($handle);
            }

            if (empty($rawDataRows)) {
                throw new EmptyFileException('The following file is empty: ' . $filePath . "\n");
            }
        } else {
            throw new FileNotFoundException("The file does not exist." . $filePath . "\n");
        }

        return new File($filePath, $rawDataRows);
    }
}