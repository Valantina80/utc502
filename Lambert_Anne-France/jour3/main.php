<?php


require('ParserFactory.php');
require('Parser.php');
require('CsvParser.php');
require('XmlParser.php');
require('WriterFactory.php');
require('Writer.php');
require('HtmlWriter.php');
require('CliWriter.php');
use LambertAnne_France\Parser;
use LambertAnne_France\CsvParser;
use LambertAnne_France\ParserFactory;
use LambertAnne_France\XmlParser;
use LambertAnne_France\WriterFactory;
use LambertAnne_France\Writer;
use LambertAnne_France\CliWriter;
use LambertAnne_France\HtmlWriter;

$o=ParserFactory::getInstance();
$w=WriterFactory::getInstance();


if (isset($argc)) {
    $optionsDemandees = getopt('', ["csv", "xml"]);
    //csv cli
    if(array_key_exists('csv', $optionsDemandees)){
        $fichier=$o->getParser('moncsv.csv');
        $objet=$fichier->donnees();
        $moncli=$w->getWriter('cli',$objet);
        $moncli->afficheObjet();
    }
    //xml cli
    if(array_key_exists('xml', $optionsDemandees)){
        $fichier=$o->getParser('monxml.xml');
        $objet=$fichier->donnees();
        $moncli=$w->getWriter('cli',$objet);
        $moncli->afficheObjet();
    }
}else{
    //html
    if (isset($_GET['type']) && $_GET['type'] === 'xml') {
        //xml
        $fichier=$o->getParser('monxml.xml');
        $objet=$fichier->donnees();
        $monhtml=$w->getWriter('html',$objet);
        $monhtml->afficheObjet();
    } else {
        //csv
        $fichier=$o->getParser('moncsv.csv');
        $objet=$fichier->donnees();
        $monhtml=$w->getWriter('html',$objet);
        $monhtml->afficheObjet();
    }
} 
?>