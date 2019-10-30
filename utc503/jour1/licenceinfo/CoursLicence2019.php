<?php


namespace LambertAnne_France;

/**
 * Cours de licence 2019
 */
class CoursLicence2019 extends CoursLicence
{
    protected static $nombreEleves;

    /**
     * Retourne l'année de début du tp.
     * @return mixed
     */
    public function getAnnee():int
    {
        return 2019;
    }

   
}