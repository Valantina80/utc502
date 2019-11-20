<?php


namespace LambertAnne_France\Afficheurs;

use LambertAnne_France\CoursLicence;
use LambertAnne_France\EnsembleDeCours;

class AfficheurDeCoursHtml implements AfficheurDeCours
{
    use DecomposeurAffichageEnsembleDeCours;
    /**
     * @var \XMLWriter
     */
    private $xmlWriter;

    /**
     * @param EnsembleDeCours $EnsembleDeCours
     * @return string HTML présentant le résumé de chaque tp
     */
    public function afficheResume(EnsembleDeCours $EnsembleDeCours)
    {
        $this->debutAffichageEnsemble();
        foreach ($EnsembleDeCours as $cours) {
            $this->xmlWriter->startElement("fieldset");
            $this->afficheResumeCours($cours);
            $this->xmlWriter->endElement();
            $this->xmlWriter->writeElement('br');
        }
        return $this->finitAffichageEnsemble();
    }

    /**
     * @param EnsembleDeCours $EnsembleDeCours
     * @return string HTML représentant l'ensemble
     */
    public function afficheIntegraliteInfos(EnsembleDeCours $EnsembleDeCours)
    {
        $this->debutAffichageEnsemble();
        foreach ($EnsembleDeCours as $cours) {
            $this->xmlWriter->startElement("fieldset");
            $this->afficheIntegraliteCours($cours);
            $this->xmlWriter->endElement();
            $this->xmlWriter->writeElement('br');
        }
        return $this->finitAffichageEnsemble();
    }

    /**
     * @param CoursLicence $cours
     * @return string HTML affichant le résumé du cours
     */
    protected function afficheResumeCours(CoursLicence $cours)
    {
        $this->ecritDonnee('Nombre d\'élèves de licence', $cours::getNombreEleves());
        $this->ecritSeparateur();
        $this->ecritTitre('Cours de "' . $cours->getIntitule() . '"', 1);
        $this->xmlWriter->startElement("ul");
        $this->ecritDonnee('Identifiant académique', $cours->getIdentifiantAcademique());
        $this->ecritDonnee('Charge totale', $cours->getChargeTotale(), ' jours');
        $this->ecritDonnee('Nombre de notes total', $cours->getNombreNotes());
        $this->ecritDonnee('Note', $cours->getNote());
        $this->ecritDonnee('Nombre total d\'élèves', CoursLicence::$nombreTotalEleves);
        $this->xmlWriter->endElement();
    }

    /**
     * @param CoursLicence $cours
     * @return string HTML représentant l'intégralité du cours
     */
    public function afficheIntegraliteCours(CoursLicence $cours)
    {
        $this->afficheResumeCours($cours);

        $this->ecritSeparateur();

        $this->ecritTitre('SEQUENCES');

        $this->xmlWriter->startElement("ul");
        foreach ($cours->getSequences() as $sequence) {
            $this->ecritSeparateur();
            $this->ecritDonnee('Contenu', $sequence->getContenu());
            $this->ecritDonnee('Charge', $sequence->getCharge());
            $this->ecritDonnee('Intervenant', $sequence->getIntervenant());
            if($sequence->getIntervenant()->getQualiteProjetSmartCity != null){
                $this->ecritDonnee('Qualité ', $sequence->getIntervenant()->getQualiteProjetSmartCity);
            }
          
        }
        $this->xmlWriter->endElement();

        $this->ecritSeparateur();

        $this->ecritTitre('EVALUATIONS');
        $this->xmlWriter->startElement("ul");
        foreach ($cours->getEvaluations() as $evaluation) {
            $this->ecritSeparateur();
            $this->ecritDonnee('Type', $evaluation->getType());
            $this->ecritDonnee('Description', $evaluation->getDescription());
            $this->ecritDonnee('Echelle', $evaluation->getEchelle());
            $this->ecritDonnee('Coefficient', $evaluation->getCoefficient());
        }
        $this->xmlWriter->endElement();
    }

    /**
     * @param string $libelleLigne
     * @param string $donnee
     * @param string $suffixe
     * Définition de l'affichage d'un ligne en html
     * @return string
     */
    protected function ecritDonnee(string $libelleLigne, string $donnee,string $suffixe = null)
    {
        $this->xmlWriter->writeElement('li', $libelleLigne . ' : ' . $donnee . ($suffixe ?? ''));
    }

    /**
     * définition de l'affichage du séparateur
     * @return string
     */
    protected function ecritSeparateur()
    {
        $this->xmlWriter->writeElement('hr');
    }

    /**
     * définition de l'affichage du titre
     * @return string
     */
    protected function ecritTitre(string $titre,int  $niveau = 2)
    {
        $this->xmlWriter->writeElement('h' . $niveau, $titre);
    }

    /**
     * définition du début du code xml de la page html
     * @return string
     */
    private function debutAffichageEnsemble()
    {
        $this->xmlWriter = new \XMLWriter();
        $this->xmlWriter->openMemory();
        $this->xmlWriter->startDocument("1.0", "UTF-8");
        $this->xmlWriter->startElement("div");
    }

    /**
     * éfinition de la fin du code xml de la page html
     * @return string
     */
    private function finitAffichageEnsemble()
    {
        $this->xmlWriter->endElement();
        $this->xmlWriter->endDocument();
        return $this->xmlWriter->outputMemory();
    }
   
}