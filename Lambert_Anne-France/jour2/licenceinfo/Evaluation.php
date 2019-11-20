<?php

namespace LambertAnne_France;

/**
 * évaluation d'un cours
 */
class Evaluation
{
    CONST TYPE_PONCTUELLES = 'évaluations ponctuelles';
    CONST TYPE_PRATIQUE = 'évaluation pratique';

    CONST ECHELLE_ELEVE = 'individu';
    CONST ECHELLE_GROUPE = 'groupe';

    private $type;
    private $description;
    private $coefficient;
    private $echelle;

    /**
     * Evaluation constructor.
     * @param $type
     * @param $description
     * @param $coefficient
     * @param $echelle
     */
    public function __construct(string $type, string $description, float $coefficient, string $echelle)
    {
        $this->type = $type;
        $this->description = $description;
        $this->coefficient = $coefficient;
        $this->echelle = $echelle;
    }

    /**
     * @return string
     */
    public function getType():string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getDescription():string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @return float
     */
    public function getCoefficient():float
    {
        return $this->coefficient;
    }

    /**
     * @param float $coefficient
     */
    public function setCoefficient(float $coefficient)
    {
        $this->coefficient = $coefficient;
    }

    /**
     * @return string
     */
    public function getEchelle():string
    {
        return $this->echelle;
    }

    /**
     * @param string $echelle
     */
    public function setEchelle(string $echelle)
    {
        $this->echelle = $echelle;
    }


}