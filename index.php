<?php

require_once 'vendor/autoload.php';
require_once 'src/NrwUe.php';

echo createNrwUe('Max M�ller', '01022003', 'Stra�e 1/2/3', '1234', 'Wien', '9 - Wien', './src/Unterstuetzungserklaerung_NR.pdf');

?>