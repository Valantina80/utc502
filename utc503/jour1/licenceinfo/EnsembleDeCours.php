<?php


namespace LambertAnne_France;

/**
 * Ensemble de cours pour l'affichage de plusieurs cours
 */
class EnsembleDeCours /*implements Iterator*/
{
    private $listeCours;

    /**
     * EnsembleDeCours constructor.
     * @param $listeCours
     */
    public function __construct(array $listeCours = null)
    {
        if ($listeCours) {
            $this->listeCours = $listeCours;
        } else {
            $this->listeCours = array();
        }
    }

    /**
     * @return array
     */
    public function getListeCours():array
    {
        return $this->listeCours;
    }

    /**
     * @param array $listeCours
     */
    public function setListeCours(array $listeCours)
    {
        $this->listeCours = $listeCours;
    }

    /**
     *  Ajout d'un cours dans EnsembleDeCours
     *  @param $cours CoursLicence, cours qui va être ajouté
     */
    public function addCours(CoursLicence $cours)
    {
        $this->listeCours[] = $cours;
    }

    /**
     *  Supression d'un cours dans EnsembleDeCours
     *  @param $cours CoursLicence, cours qui va être supprimé
     */
    public function deleteCours(CoursLicence $cours)
    {
        if ($cleCours = array_search($cours, $this->listeCours)) {
            unset($this->listeCours[$cleCours]);
        }
    }
    public function rewind() {
        $this->position = 0;
    }

    public function current() {
        return $this->array[$this->position];
    }

    public function key() {
        return $this->position;
    }

    public function next() {
        ++$this->position;
    }

    public function valid() {
        return isset($this->array[$this->position]);
    }
}