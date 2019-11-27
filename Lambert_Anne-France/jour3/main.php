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


if (isset($argc)) {
    $optionsDemandees = getopt('', ["csv", "xml", "cli", "html"]);
    if(array_key_exists('csv', $optionsDemandees)){
        $o=ParserFactory::getInstance();
        $fichier=$o->getParser('moncsv.csv');
        $objet=$fichier->donnees();
        $w=WriterFactory::getInstance();

        if (array_key_exists('cli', $optionsDemandees)) {
            //cli
            $moncli=$w->getWriter('cli',$objet);
            $moncli->afficheObjet();
        } else {
            //html
            $monhtml=$w->getWriter('html',$objet);
            $monhtml->afficheObjet();
        }
    }
    if(array_key_exists('xml', $optionsDemandees)){
        $o=ParserFactory::getInstance();
        $fichier=$o->getParser('monxml.xml');
        $fichier->donnees();
        $objet=$fichier->donnees();
        $w=WriterFactory::getInstance();
        if (array_key_exists('cli', $optionsDemandees)) {
            //cli
            $moncli=$w->getWriter('cli',$objet);
            $moncli->afficheObjet();
        } else {
            //html
            $monhtml=$w->getWriter('html',$objet);
            $monhtml->afficheObjet();
        }
    }
} 
?>