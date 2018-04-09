<?php

/**
 * Class FilePathFinder
 */
class FilePathFinder {

    /**
     * Class variables
     */
    private $files;

    /**
     * Receives path to a directory and returns all the file paths in it
     * 
     * @param $directory
     * @return
     * @throws InvalidDirectoryException
     */
    public function findFiles($directory) {

        try {
            $dir = new DirectoryIterator($directory);
            foreach ($dir as $file) {

                if ($file->isDir() && !$file->isLink() && !$file->isDot()) {
                    // recurse into directories other than a few special ones
                    $this->findFiles($file->getPathname());
                } elseif ($file->getPathname() && !$file->isLink() && !$file->isDot()) {
                    $this->files[] = $file->getPathname();
                }
            }

        } catch (UnexpectedValueException $error) {
            throw new InvalidDirectoryException("Failed to open dir: No such file or directory $directory\n");
        }

        return $this->files;
    }
}