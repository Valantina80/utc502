<?php


require('ParserFactory.php');
require('Parser.php');
require('CsvParser.php');
require('XmlParser.php');
use LambertAnne_France\Parser;
use LambertAnne_France\CsvParser;
use LambertAnne_France\ParserFactory;
use LambertAnne_France\XmlParser;


$o=ParserFactory::getInstance();
$fichier=$o->getParser('moncsv.csv');
$fichier->donnees();

?>