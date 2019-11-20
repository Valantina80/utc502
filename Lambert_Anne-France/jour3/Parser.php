<?php
namespace LambertAnne_France;

abstract class Parser 
{
    private $file;
    
    protected function __construct($file)
    {
        $this->file=$file;
    }

    public abstract function entete();
    public abstract function donnees();
    public abstract function transformeDonneesObjet($ligne);

}

?>