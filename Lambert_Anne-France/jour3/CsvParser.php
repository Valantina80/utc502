<?php
namespace LambertAnne_France;

use stdClass;
use SplFileObject;

class CsvParser extends Parser
{
    private $csv;

    public function __construct($csv)
    {
        $csv= new SplFileObject($csv);
        $this->csv=$csv;
        parent::__construct($csv);
    }
    public function transformeDonneesObjet($ligne)
    {
        $o=new stdClass;
        for($i=0; $i < count($this->entete()); $i++)
        {
            $entete=$this->entete()[$i];
            $o->$entete=$ligne[$i];
        }
        var_dump($o);

    }
    public function entete()
    {
        if (($handle = fopen($this->csv->getBasename(), "r")) !== FALSE) {
            return(fgetcsv($handle, 1000, "\t")) ;
        }
    }
    public function donnees()
    {
        if (($handle = fopen($this->csv->getBasename(), "r")) !== FALSE) {
            fgetcsv($handle);
            while (($data = fgetcsv($handle, 1000, "\t")) !== FALSE) {
                $this->transformeDonneesObjet($data);
            }
            fclose($handle);
        }  
    }
    
    
}



?>