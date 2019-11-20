<?php


namespace LambertAnne_France\Afficheurs;
/**
 * définition des méthodes de l'afficheur de cours 
 */
trait DecomposeurAffichageEnsembleDeCours {
    public abstract function debutAffichageEnsemble() ;
    public abstract function finitAffichageEnsemble() ;
    public abstract function afficheResumeCours(CoursLicence $cours);
    public abstract function afficheIntegraliteCours(CoursLicence $cours) ;

}



?>