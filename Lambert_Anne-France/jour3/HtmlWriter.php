<?php
namespace LambertAnne_France;
/**
 * affiche une liste d'objets en html
 */
class HtmlWriter extends Writer{
    private $listeObject;
    /**
     * HtmlWriter constructor.
     */
    public function __construct(array $listeObject)
    {
        $this->listeObject=$listeObject;
    }
     /**
     * itère sur la liste d'objets pour les afficher en liste non ordonnée
     */
    public function afficheObjet(){
        foreach($this->listeObject as $unObjet){
            echo("<ul>");
            foreach($unObjet as $key=>$value){
                if($value != null){
                    echo("<li>".$key." : ".$value."</li>");
                }
            }
            echo("</ul>");
        }
    }
}
?>