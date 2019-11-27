<?php
namespace LambertAnne_France;

use stdClass;
use SplFileObject;

/**
 * transforme un fichier csv en liste d'objets
 */
class CsvParser extends Parser
{
    private $csv;
    /**
     * CsvParser constructor.
     */
    public function __construct($csv)
    {
        $csv= new SplFileObject($csv);
        $this->csv=$csv;
        parent::__construct($csv);
    }
    /**
     * transforme la ligne de donnees en objet
     * @param array $ligne
     * @return stdClass
     */
    public function transformeDonneesObjet($ligne)
    {
        $o=new stdClass;
        for($i=0; $i < count($ligne); $i++)
        {
            $entete=$this->entete()[$i];
            $o->$entete=$ligne[$i];
        }     
        return($o);
    }
    /**
     * transforme l'entete du fichier en tableau
     * @return array
     */
    public function entete()
    {
        if (($handle = fopen($this->csv->getBasename(), "r")) !== FALSE) {
            return(fgetcsv($handle, 1000, "\t")) ;
        }
    }
    /**
     * transforme les donnees du fichier en tableau d'objets
     * @return array
     */
    public function donnees()
    {
        $mesObjets=array();
        if (($handle = fopen($this->csv->getBasename(), "r")) !== FALSE) {
            fgetcsv($handle);
            while (($data = fgetcsv($handle, 1000, "\t")) !== FALSE) {
               $monObjet=$this->transformeDonneesObjet($data);
               array_push($mesObjets,$monObjet);
            }
            fclose($handle);
        }  
        return( $mesObjets);
    }
    
    
}



?>