<?php
namespace LambertAnne_France;
 /**
 * Transforme un fichier en liste d'objets
 */
abstract class Parser 
{
    private $file;
    /**
     * Parser constructor.
     */
    protected function __construct($file)
    {
        $this->file=$file;
    }

    /**
     * transforme la ligne de donnees en objet
     * @param array $ligne
     */
    public abstract function transformeDonneesObjet($ligne);
    /**
     * transforme l'entete/les tags des noeuds du fichier en tableau
     * @return array
     */
    public abstract function entete();
    /**
     * transforme les donnees du fichier en tableau d'objets
     * @return array
     */
    public abstract function donnees();
    

}

?>