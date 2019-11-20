<?php


namespace LambertAnne_France;

/**
 * Cours de licence 2018
 */
class CoursLicence2018 extends CoursLicence
{
    protected static $nombreEleves;

    /**
     * Retourne l'année de début du tp.
     * @return int
     */
    public function getAnnee():int
    {
        return 2018;
    }

}