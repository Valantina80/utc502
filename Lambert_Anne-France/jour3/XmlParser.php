<?php
namespace LambertAnne_France;
use XMLReader;
use DOMDocument;
// https://www.php.net/manual/en/class.xmlreader.php
// "This is my new child of XML parsing method  based on my and yours modification."
class XmlParser extends Parser
{
    private $xml;
    private $name;

    public function __construct($name)
    {
        $this->xml= new XMLReader();

       // $this->xml=$xml;
        $this->name=$name;
        parent::__construct($this->xml);
    }
    public function entete()
    {
        $doc=new DOMDocument;
        if (!$this->xml->open($this->name)) {
            die("Impossible d'ouvrir '".$this->name."'");
        }

        while($this->xml->read()) {
            if ($this->xml->nodeType == XMLReader::ELEMENT && $this->xml->name == 'personne') {
                $node = simplexml_import_dom($doc->importNode($this->xml->expand(), true));
                foreach ($node as $key => $value) {
                    keyTab=array[];
                    //mettre clé dans array
                    echo("hey".$key) ;

                    //$entete=$this->entete()[$i];
                    //$o->$entete=$ligne[$i];
                }
               // echo $node->nom;
              //  echo $node->prenom;
               // echo $node->age;
            }
        }
        $this->xml->close();
    
    }
    public function donnees()
    {
   
    }
    public function transformeDonneesObjet($ligne)
    {
        
    }

}


?>