<?php
namespace LambertAnne_France;

class XmlParser extends Parser
{
    private $xml;

    public function __construct($xml)
    {
        $this->xml=$xml;
        parent::__construct($xml);
    }
    public function entete()
    {

    }
    public function donnees()
    {
   
    }
    public function transformeDonneesObjet($ligne)
    {
        
    }

}


?>