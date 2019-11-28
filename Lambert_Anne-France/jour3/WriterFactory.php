<?php
namespace LambertAnne_France;

use LambertAnne_France\Singleton;
use Exception;
/**
 * appelle CliWriter ou HtmlWriter en fonction du premier argument (cli ou html)
 */
class WriterFactory{ 

    private static $_instance = null;
    /**
     * constructor WriterFactory
     */
    private function __construct() {  
    }
    /**
     * permet de ne pouvoir l'appeler qu'une fois
     * @return WriterFactory
     */
    public static function getInstance() {
 
        if(is_null(self::$_instance)) {
        self::$_instance = new WriterFactory();  
        }
 
        return self::$_instance;
    }
    /**
     * instanciation en fonction du premier argument donné
     */
    public static function getWriter(string $name, array $objets) {
        switch ($name) {
            case "cli":
                return new CliWriter($objets);
            case "html":
                return new HtmlWriter($objets);
            default:
                throw new Exception($name." n 'est pas une option d'écriture disponible.");
        }
    }
}

?>