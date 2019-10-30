<?php

namespace LambertAnne_France;

class Intervenant{

    private $nom;
    private $prenom;
    public static $qualite=['Yannick-Le Pape'=>'Ingénieur','Cyril-Pereira'=>'Programmeur','Imed-Nasri'=>'Enseignant Chercheur et Responsable de Formation chez CNAM'];


    /**
     * Intervenant constructor.
     * @param $nom
     * @param $description
     */
    public function __construct(string $nom, string $prenom)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getNom():string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getPrenom():string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom(string $prenom)
    {
        $this->prenom = $prenom;
    }


    public function __get($name)
    {
        if($name == 'getQualiteProjetSmartCity'){
            if (array_key_exists($this->nom.'-'.$this->prenom, Intervenant::$qualite)) {
                return(Intervenant::$qualite[$this->nom.'-'.$this->prenom].PHP_EOL);
            }else{
                return null;
            }     
        }else{
            return('la fonction '. $name .' n\'existe pas.');
        }             
    }

    public function __toString()
    {
        return $this->nom.' '.$this->prenom;
    }
   

}


?>