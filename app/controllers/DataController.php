<?php

/**
 * Class DataController
 */
class DataController
{
    /**
     * Index function is run as the entry method
     */
    public static function index()
    {
        // Path to all batch files
        $directory = __DIR__ . "/../../public/batchData";

        // File Path Finder
        $files = (new FilePathFinder())->findFiles($directory);

        // Path to appCodes.ini
        $appCodesPath = __DIR__ . "/../../public/batchData/appCodes.ini";

        // Csv Data Transformer
        $csvDataTransformer = new CsvDataTransformer(new AppCodes($appCodesPath));

        // Write data to new csv file
        foreach ($files as $file) {
            try {
                $fileParser = new FileParser();
                $file = $fileParser->parseFile($file);

                $csvFile = $csvDataTransformer->transform($file);

                $writer = new CsvWriter();
                $writer->write($csvFile);
            } catch (FileNotFoundException|EmptyDirectoryException|AppCodeNotFoundException|EmptyFileException|InvalidDirectoryException $e) {
                echo $e->getMessage();
            }
        }

        echo "The script is now complete\n";
    }
}