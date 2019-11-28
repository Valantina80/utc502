<?php
namespace LambertAnne_France;

use LambertAnne_France\Singleton;
use Exception;
/**
 * appelle XmlParser ou CsvParser en fonction du type de fichier donné en argument
 */
class ParserFactory{ 

    private static $_instance = null;
    /**
     * constructor ParserFactory
     */
    private function __construct() {  
    }
    /**
     * permet de ne pouvoir l'appeler qu'une fois
     * @return ParserFactory
     */
    public static function getInstance() {
 
        if(is_null(self::$_instance)) {
        self::$_instance = new ParserFactory();  
        }
 
        return self::$_instance;
    }
    /**
     * instanciation en fonction du type de fichier
     */
    public static function getParser(string $name) {
        switch (pathinfo($name, PATHINFO_EXTENSION)) {
            case "xml":
                return new XmlParser($name);
            case "csv":
                return new CsvParser($name);
            default:
                throw new Exception("Ce type de fichier n'est pas pris en charge : ". $name);
        }
    }
}

?>