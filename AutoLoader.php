<?php

/**
 * Class AutoLoader
 */
class AutoLoader {

    /**
     * Class variables
     */
    static private $classNames = array();

    /**
     * Finds classes
     * @param $dirName
     */
    public static function registerDirectory($dirName) {

     $dir = new DirectoryIterator($dirName);
     foreach ($dir as $file) {

         if ($file->isDir() && !$file->isLink() && !$file->isDot()) {
             // recurse into directories other than a few special ones
             self::registerDirectory($file->getPathname());
         } elseif (substr($file->getFilename(), -4) === '.php') {
             // save the class name / path of a .php file found
             $className = substr($file->getFilename(), 0, -4);
             AutoLoader::registerClass($className, $file->getPathname());
         }
     }
 }

    /**
     * Registers class
     * @param $className
     * @param $fileName
     */
    public static function registerClass($className, $fileName) {
     AutoLoader::$classNames[$className] = $fileName;
 }

    /**
     * Loads class
     * @param $className
     */
    public static function loadClass($className) {
     if (isset(AutoLoader::$classNames[$className])) {
         require_once(AutoLoader::$classNames[$className]);
     }
  }

}

spl_autoload_register(array('AutoLoader', 'loadClass'));