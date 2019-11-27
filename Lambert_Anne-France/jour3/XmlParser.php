<?php
namespace LambertAnne_France;
use XMLReader;
use DOMDocument;
use stdClass;
// https://www.php.net/manual/en/class.xmlreader.php
// "This is my new child of XML parsing method  based on my and yours modification."
/**
 * transforme un fichier xml en liste d'objets
 */
class XmlParser extends Parser
{
    private $xml;
    private $name;
    /**
     * XmlParser constructor.
     */
    public function __construct($name)
    {
        $this->xml= new XMLReader();
        $this->name=$name;
        parent::__construct($this->xml);
    }
    /**
     * transforme la ligne de donnees en objet
     * @param array $ligne
     * @return stdClass
     */
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
    /**
     * transforme les noms des noeuds en tableau
     * @return array
     */
    public function entete()
    {
        $doc=new DOMDocument;
        if (!$this->xml->open($this->name)) {
            die("Impossible d'ouvrir '".$this->name."'");
        }

        while($this->xml->read()) {
            if ($this->xml->nodeType == XMLReader::ELEMENT && $this->xml->name == 'personne') {
                $node = simplexml_import_dom($doc->importNode($this->xml->expand(), true));
                $keyTab=array();
                foreach ($node->children() as $child) {
                    array_push($keyTab, $child->getName());
                }
            }
        }
        return($keyTab);
    }
    /**
     * transforme les donnees du fichier en tableau d'objets
     * @return array
     */
    public function donnees()
    {
        $doc=new DOMDocument;
        if (!$this->xml->open($this->name)) {
            die("Impossible d'ouvrir '".$this->name."'");
        }

        while($this->xml->read()) {
            if ($this->xml->nodeType == XMLReader::ELEMENT && $this->xml->name == 'personne') {
                $node = simplexml_import_dom($doc->importNode($this->xml->expand(), true));
                $tabDonnees=array();
                foreach($node as $ligne){  
                    array_push($tabDonnees, $ligne->__toString()); 
                }
                $this->transformeDonneesObjet($tabDonnees);
            }    
        }
        $this->xml->close();
        
    }
   

}


?>