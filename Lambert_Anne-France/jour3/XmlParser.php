<?php
namespace LambertAnne_France;
use XMLReader;
// https://www.php.net/manual/en/class.xmlreader.php
// "This is my new child of XML parsing method  based on my and yours modification."
class XmlParser extends Parser
{
    private $xml;

    public function __construct($xml)
    {
        $xml= new XMLReader($xml);
        $this->xml=$xml;
        parent::__construct($xml);
    }
    public function entete()
    {
        // Open XML file
        

        // // Parse Xml and return result
        return $this->xml->open($this->xml)->xmlparseXml($this->xml);
    }
    public function donnees()
    {
   
    }
    public function transformeDonneesObjet($ligne)
    {
        
    }

}


?>