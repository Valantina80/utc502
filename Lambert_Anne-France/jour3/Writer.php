<?php
namespace LambertAnne_France;
/**
 * Ecrit une liste d'objets polymorphe en html ou en ligne de commande
 */
abstract class Writer
{
    private $listeObject;
    /**
     * constructor Writer
     */
    protected function __construct($listeObject)
    {
        $this->listeObject=$listeObject;
    }
    /**
     * itère sur la liste d'objets pour les afficher
     */
    public abstract function afficheObjet();
}


?>