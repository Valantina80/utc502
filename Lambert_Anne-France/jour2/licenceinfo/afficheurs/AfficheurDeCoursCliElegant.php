<?php


namespace LambertAnne_France\Afficheurs;

/**
 * affiche le cours en ligne de commande de manière élégante
 */
class AfficheurDeCoursCliElegant extends AfficheurDeCoursCli
{
    protected static $sequenceSeparateur = "~v~";
    protected static $nombreSequence = 7;

    /**
     * définition d'une ligne pour l'affichage de manière plsu élégante
     */
    protected function echoLigneDonnee(string $libelleLigne, string $donnee, string $suffixe = null)
    {
        parent::echoLigneDonnee($libelleLigne, '[' . $donnee . ']', $suffixe);
    }

    /**
     * définition d un titre de séquence de manière plus élégante
     */
    protected function echoLigneTitre(string $titre)
    {
        echo self::$sequenceSeparateur, ' ', $titre, ' ', self::$sequenceSeparateur, PHP_EOL;
    }
}