<?php


namespace LambertAnne_France;

/**
 * Intervenants
 */
class Intervenant
{
    private $nom;
    private $prenom;

    /**
     * Sequence constructor.
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

    public function __call($nom, $prenom) //à modifier
    {
        echo "Définition de '$name' à la valeur '$value'\n";
        $this->data[$name] = $value;
    }

}