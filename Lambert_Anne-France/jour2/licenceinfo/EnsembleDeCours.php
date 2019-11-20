<?php

namespace LambertAnne_France;
use Iterator;
/**
 * Ensemble de cours pour l'affichage de plusieurs cours
 */
class EnsembleDeCours implements Iterator
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

    /**
     * utilisation d'Iterator 
     */
    public function rewind()
    {
        reset($this->listeCours);
    }

    public function current()
    {
        $listeCours = current($this->listeCours);
        return $listeCours;
    }

    public function key()
    {
        $listeCours = key($this->listeCours);
        return $listeCours;
    }

    public function next()
    {
        $listeCours = next($this->listeCours);
        return $listeCours;
    }

    public function valid()
    {
        $key = key($this->listeCours);
        $listeCours = ($key !== NULL && $key !== FALSE);
        return $listeCours;
    }
}