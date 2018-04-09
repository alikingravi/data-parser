<?php

class DataController
{
    public static function index()
    {
        // Find the file
        $directory = __DIR__ . "/../../public/batchData";

        $files = (new FilePathFinder())->findFiles($directory);

        $appCodesPath = __DIR__ . "/../../public/batchData/appCodes.ini";
        $csvDataTransformer = new CsvDataTransformer(new AppCodes($appCodesPath));

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
    }
}