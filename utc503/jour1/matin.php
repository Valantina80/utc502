<?php

require 'licenceinfo/CoursLicence.php';
require 'licenceinfo/CoursLicence2019.php';
require 'licenceinfo/Evaluation.php';
require 'licenceinfo/Sequence.php';

use SaintVincent\LicenceInfo\Evaluation;
use SaintVincent\LicenceInfo\Sequence;
use SaintVincent\LicenceInfo\CoursLicence2019;

CoursLicence2019::setNombreEleves(11);

$utc503 = new CoursLicence2019();
$utc503->setIntitule("paradigmes de la programmation");
$utc503->setIdentifiantAcademique("UTC 503");
$utc503->setNote("******");

$sequence1 = new Sequence("Yannick Le Pape", 4, 'Audit des connaissances, rappel et consolidation des principes de la POO, POC en PHP objet, initiation JavaScript objet');
$sequence2 = new Sequence("Cyril Pereira", 2, 'Création d\'un micro-framewor');
$utc503->addSequence($sequence1);
$utc503->addSequence($sequence2);

$evaluation1 = new Evaluation(Evaluation::TYPE_PONCTUELLES, 'TP en tp et à la maison', 6, Evaluation::ECHELLE_ELEVE);
$evaluation2 = new Evaluation(Evaluation::TYPE_PRATIQUE, 'mini projet à réaliser dans un temps limité', 4, Evaluation::ECHELLE_ELEVE);
$utc503->addEvaluation($evaluation1);
$utc503->addEvaluation($evaluation2);

echo 'Nombre d\'élèves de licence : ', CoursLicence2019::getNombreEleves(), PHP_EOL;
echo '------', PHP_EOL;
echo 'Cours : ', $utc503->getIntitule(), PHP_EOL;
echo 'Identifiant académique : ', $utc503->getIdentifiantAcademique(), PHP_EOL;
echo 'Charge totale : ', $utc503->getChargeTotale(), ' jours', PHP_EOL;
echo 'Nombre de notes total : ', $utc503->getNombreNotes(), PHP_EOL;
echo 'Note : ', $utc503->getNote(), PHP_EOL;
echo 'SEQUENCES ', PHP_EOL;
foreach ($utc503->getSequences() as $sequence) {
    echo '------', PHP_EOL;
    echo 'Contenu : ', $sequence->getContenu(), PHP_EOL;
    echo 'Charge : ', $sequence->getCharge(), PHP_EOL;
    echo 'Intervenant : ', $sequence->getIntervenant(), PHP_EOL;
}
echo '------', PHP_EOL;
echo 'EVALUATIONS ', PHP_EOL;
foreach ($utc503->getEvaluations() as $evaluation) {
    echo '------', PHP_EOL;
    echo 'Type : ', $evaluation->getType(), PHP_EOL;
    echo 'Description : ', $evaluation->getDescription(), PHP_EOL;
    echo 'Echelle : ', $evaluation->getEchelle(), PHP_EOL;
    echo 'Coefficient : ', $evaluation->getCoefficient(), PHP_EOL;
}
