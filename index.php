<?php

require_once 'vendor/autoload.php';
require_once 'src/NrwUe.php';

echo createNrwUe('Max Müller', '01022003', 'Straße 1/2/3', '1234', 'Wien', '9 - Wien', './src/Unterstuetzungserklaerung_NR.pdf');

?>