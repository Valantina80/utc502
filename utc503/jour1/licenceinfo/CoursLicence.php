<?php


namespace LambertAnne_France;

/**
 * Cours de licence toutes promos confondus
 */
abstract class CoursLicence
{
    private $intitule;
    private $identifiantAcademique;
    private $sequences;
    private $evaluations;
    private $note;
    protected static $nombreEleves;
    public static $nombreTotalEleves;

    /**
     * CoursLicence2019 constructor.
     */
    public function __construct()
    {
        $this->sequences = array();
        $this->evaluations = array();
    }

    /**
     * Retourne l'année de début du tp.
     * @return int
     */
    public abstract function getAnnee():int;

    /**
     * @return int
     */
    public static function getNombreEleves():int{
        return static::$nombreEleves;
    }

    /**
     * @param int $nombreEleves
     */
    public static function setNombreEleves(int $nbEleves){
        if (static::$nombreEleves>$nbEleves){
            $diff=static::$nombreEleves-$nbEleves;
            self::$nombreTotalEleves=self::$nombreTotalEleves-$diff;
        }else{
            $diff=$nbEleves-static::$nombreEleves;
            self::$nombreTotalEleves=self::$nombreTotalEleves+$diff;
        }
        static::$nombreEleves = $nbEleves;
    }

    /**
     * @return string
     */
    public function getIntitule():string
    {
        return $this->intitule;
    }

    /**
     * @param string $intitule
     */
    public function setIntitule(string $intitule)
    {
        $this->intitule = $intitule;
    }

    /**
     * @return string
     */
    public function getIdentifiantAcademique():string
    {
        return $this->identifiantAcademique;
    }

    /**
     * @param string $identifiantAcademique
     */
    public function setIdentifiantAcademique(string $identifiantAcademique)
    {
        $this->identifiantAcademique = $identifiantAcademique;
    }

    /**
     * @return array
     */
    public function getSequences():array
    {
        return $this->sequences;
    }

    /**
     * @param array $sequences
     */
    public function setSequences(array $sequences)
    {
        $this->sequences = $sequences;
    }

    /**
     * @param Sequence $sequence
     */
    public function addSequence(Sequence $sequence)
    {
        $this->sequences[] = $sequence;
    }

    /**
     * @return array
     */
    public function getEvaluations():array
    {
        return $this->evaluations;
    }

    /**
     * @param array $evaluations
     */
    public function setEvaluations(array $evaluations)
    {
        $this->evaluations = $evaluations;
    }

    /**
     * @param Evaluation $evaluation
     */
    public function addEvaluation(Evaluation $evaluation)
    {
        $this->evaluations[] = $evaluation;
    }

    /**
     * @return string
     */
    public function getNote():string
    {
        return $this->note;
    }

    /**
     * @param string $note
     */
    public function setNote(string $note)
    {
        $this->note = $note;
    }

    /**
     * Renvoie la liste des intervenants dans le tp en considérant.
     *
     * @return array tableau des intervenants
     */
    public function getIntervenants():array
    {
        $intervenants = array();
        foreach ($this->getSequences() as $sequence) {
            $intervenants[] = $sequence->getIntervenant();
        }
        return $intervenants;
    }

    /**
     * Renvoie la charge totale du tp en totalisant la charge de chaque séquence.
     *
     * @return int la charge totale du tp en nombre de jours
     */
    public function getChargeTotale():int
    {
        $chargeTotale = 0;
        foreach ($this->getSequences() as $sequence) {
            $chargeTotale += $sequence->getCharge();
        }
        return $chargeTotale;
    }

    /**
     * Calcule le nombre de notes total du tp, lié au nombre d'évaluation
     * et au nombre d'élèves.
     *
     * @return float|int le nombre total de notes du tp
     */
    public function getNombreNotes():float
    {
        return count($this->evaluations) * static::getNombreEleves();
    }

    /**
     * Calcule la note sur 20.
     *
     * @param $noteParEvaluation array lien entre une évaluation et une note
     *
     * @return float|int le nombre total de notes du tp
     */
    public static function calculeMoyenneCours(float $noteParEvaluation):float
    {
        $noteCours = 0;
        $coeffTotal = 0;
        foreach ($noteParEvaluation as $evaluation => $note) {
            $noteCours += $note * $evaluation->getCoefficient();
            $coeffTotal += $evaluation->getCoefficient();
        }
        return $noteCours / $coeffTotal;
    }
    public function clonage(){
        return clone $this;
    }
   
    

}