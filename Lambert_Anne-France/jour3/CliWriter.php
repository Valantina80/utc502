<?php
namespace LambertAnne_France;

/**
 * affiche une liste d'objets en ligne de commande
 */
class CliWriter extends Writer{

    private $listeObject;
    /**
     * CliWriter constructor.
     */
    public function __construct(array $listeObject)
    {
        $this->listeObject=$listeObject;
    }
    /**
     * itère sur la liste d'objets pour les afficher
     */
    public function afficheObjet(){
        foreach($this->listeObject as $unObjet){
            foreach($unObjet as $key=>$value){
                echo($key." : ".$value.PHP_EOL);
            }
            echo(PHP_EOL);
        }
    }
}
?>