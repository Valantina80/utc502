<?php

namespace LambertAnne_France;
/**
 * Intervenant d'une séquence
 */
class Intervenant{

    private $nom;
    private $prenom;
    public static $qualite=['Yannick-Le Pape'=>'Ingénieur','Cyril-Pereira'=>'Programmeur','Imed-Nasri'=>'Enseignant Chercheur et Responsable de Formation chez CNAM'];


    /**
     * Intervenant constructor.
     * @param $nom
     * @param $prenom
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

    /**
     * affiche la qualité de l'intervenant pour l'appel de la fonction getQualiteProjetSmartCity
     * @param $name : nom de la fonction à utiliser
     * @return string la qualité de l'intervenant
     */
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
    /**
     * affiche l'intervenant en chaine de caractères
     * @return string
     */
    public function __toString()
    {
        return $this->nom.' '.$this->prenom;
    }
   

}


?>