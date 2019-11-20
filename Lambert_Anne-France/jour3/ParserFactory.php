<?php
namespace LambertAnne_France;

use LambertAnne_France\Singleton;
use Exception;

class ParserFactory{ 

    private static $_instance = null;

    private function __construct() {  
    }
 
    public static function getInstance() {
 
        if(is_null(self::$_instance)) {
        self::$_instance = new ParserFactory();  
        }
 
        return self::$_instance;
    }

    public static function getParser($name) {
        switch (pathinfo($name, PATHINFO_EXTENSION)) {
            case "xml":
                return new XmlParser($name);
            case "csv":
                return new CsvParser($name);
            default:
                throw new Exception("File type unsupported". $name);
        }
    }
}

?>