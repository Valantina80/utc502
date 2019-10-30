<?php


namespace LambertAnne_France\Afficheurs;

use LambertAnne_France\CoursLicence;
use LambertAnne_France\EnsembleDeCours;
/**
 * affiche le cours en ligne de commande
 */
class AfficheurDeCoursCli implements AfficheurDeCours
{
    use DecomposeurAffichageEnsembleDeCours;
    protected static $sequenceSeparateur = "-";
    protected static $nombreSequence = 10;

    /**
     * Affiche le résumé de l'ensemble des cours
     * @param EnsembleDeCours $ensembleCours
     */
    public function afficheResume(EnsembleDeCours $ensembleCours)
    {
        foreach ($ensembleCours->getListeCours() as $cours) {
            $this->afficheResumeCours($cours);
        }
    }

    /**
     * Affiche l'intégralité de l'ensemble des cours
     * @param EnsembleDeCours $ensembleCours
     * @return string représentant l'ensemble
     */
    public function afficheIntegraliteInfos(EnsembleDeCours $ensembleCours)
    {
        foreach ($ensembleCours->getListeCours() as $cours) {
            $this->afficheIntegraliteCours($cours);
        }
    }

    /**
     * résumé d'un cours
     * @param CoursLicence $cours 
     * @return string présentant le résumé de chaque tp
     */
    protected function afficheResumeCours(CoursLicence $cours)
    {
        $this->echoLigneDonnee('Nombre d\'élèves de licence', $cours::getNombreEleves());

        $this->echoLigneSeparateur();

        $this->echoLigneDonnee('Cours', $cours->getIntitule());
        $this->echoLigneDonnee('Identifiant académique', $cours->getIdentifiantAcademique());
        $this->echoLigneDonnee('Charge totale', $cours->getChargeTotale(), ' jours');
        $this->echoLigneDonnee('Nombre de notes total', $cours->getNombreNotes());
        $this->echoLigneDonnee('Note', $cours->getNote());
    }

    /**
     * intégralité d'un cours
     * @param CoursLicence $cours
     */
    public function afficheIntegraliteCours(CoursLicence $cours)
    {
        $this->afficheResumeCours($cours);

        $this->echoLigneSeparateur();

        $this->echoLigneTitre('SEQUENCES');
        foreach ($cours->getSequences() as $sequence) {
            $this->echoLigneSeparateur();
            $this->echoLigneDonnee('Contenu', $sequence->getContenu());
            $this->echoLigneDonnee('Charge', $sequence->getCharge());
            $this->echoLigneDonnee('Intervenant', $sequence->getIntervenant());
        }

        $this->echoLigneSeparateur();
        $this->echoLigneTitre('EVALUATIONS');
        foreach ($cours->getEvaluations() as $evaluation) {
            $this->echoLigneSeparateur();
            $this->echoLigneDonnee('Type', $evaluation->getType());
            $this->echoLigneDonnee('Description', $evaluation->getDescription());
            $this->echoLigneDonnee('Echelle', $evaluation->getEchelle());
            $this->echoLigneDonnee('Coefficient', $evaluation->getCoefficient());
        }
    }
    /**
     * définition d'une ligne pour l'affichage
     * @param string $libelleLigne
     * @param string $donnee 
     * @param string $suffixe
     */
    protected function echoLigneDonnee(string $libelleLigne, string $donnee, string $suffixe = null)
    {
        echo $libelleLigne, ' : ', $donnee, $suffixe ?? '', PHP_EOL;
    }

    /**
     * définition du séparateur entre les séquences
     */
    protected function echoLigneSeparateur()
    {
        echo str_repeat(static::$sequenceSeparateur, static::$nombreSequence), PHP_EOL;
    }

    /**
     * définition du titre de chaque cours
     * @param string $titre
     */
    protected function echoLigneTitre(string $titre)
    {
        echo $titre, PHP_EOL;
    }

    public function debutAffichageEnsemble(){

    }
    public function finitAffichageEnsemble(){
        
    }
}