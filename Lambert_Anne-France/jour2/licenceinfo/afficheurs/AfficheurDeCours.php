<?php


namespace LambertAnne_France\Afficheurs;

use LambertAnne_France\EnsembleDeCours;
/**
 * interface qui permet de définir le résumé du cours et l'intégralité du cours 
 * dans les différents affichages
 */
interface AfficheurDeCours
{
    public function afficheResume(EnsembleDeCours $ensembleCours);

    public function afficheIntegraliteInfos(EnsembleDeCours $ensembleCours);
}