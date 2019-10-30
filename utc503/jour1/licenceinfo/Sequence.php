<?php


namespace LambertAnne_France;

/**
 * séquence d'un cours
 */
class Sequence
{
    private $intervenant;
    private $charge;
    private $contenu;

    /**
     * Sequence constructor.
     * @param $intervenant
     * @param $charge
     * @param $contenu
     */
    public function __construct(string $intervenant, int $charge, string $contenu)
    {
        $this->intervenant = $intervenant;
        $this->charge = $charge;
        $this->contenu = $contenu;
    }

    /**
     * @return string
     */
    public function getIntervenant():string
    {
        return $this->intervenant;
    }

    /**
     * @param string $intervenant
     */
    public function setIntervenant(string $intervenant)
    {
        $this->intervenant = $intervenant;
    }

    /**
     * @return int
     */
    public function getCharge():int
    {
        return $this->charge;
    }

    /**
     * @param int $charge
     */
    public function setCharge(int $charge)
    {
        $this->charge = $charge;
    }

    /**
     * @return string
     */
    public function getContenu():string
    {
        return $this->contenu;
    }

    /**
     * @param string $contenu
     */
    public function setContenu(string $contenu)
    {
        $this->contenu = $contenu;
    }
}