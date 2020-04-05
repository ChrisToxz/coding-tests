<?php

// Submission from user mrdb303
// March coding challenge for howtocodewell.net



// Change master settings here:
define('NUM_OF_BADDIES', 100);    // Exceeding 100 may introduce duplicate names
define('DIAGNOSTICS_ON', true);  // Toggles test box showing parsed input



session_start();

require('includes/header.php');


function autoloader($class) {
	include 'classes/'.$class .'.php';
}
spl_autoload_register('autoloader');



$view = new View();
$baddies = new BaddiesData(NUM_OF_BADDIES);


$diagnosticText = '';


// Text is only output if diagnostic mode is set to true
// All input via $_GET is validated:
if(!empty($_GET['action']) && !empty($_GET['num'])){
	
	$actionIn = $_GET['action'];
	$numIn = $_GET['num'];
	
	$baddies->validateAction($actionIn);
	$diagnosticText = 'Action: '.$baddies->getAction().'\n';

	$isValidNum = $baddies->validateCharIDNumber($numIn);
	$diagnosticText .= 'Character ID: '.$baddies->getCharacterIDNumber();

} else {
	$diagnosticText = "No character action button previously set (del/inc/dec)\n";
}





if(!empty($_GET['reset'])){
	$diagnosticText .= '\nReset Selected';
	unset($_SESSION['baddieData']);
	unset($_GET['reset']);
}

if(isset($_GET['roll'])){
	$diagnosticText .= '\nDice roll';
	unset($_GET['roll']);
}



// Only create new data if no existing data in session
if(isset($_SESSION['baddieData'])) {
	$baddies->setStats($_SESSION['baddieData']);
	$data = $baddies->getStats();
} else {
	$baddies->createStats();
	$data = $baddies->getStats();
}

$_SESSION['baddieData'] = $data;


if(DIAGNOSTICS_ON) { 
	$diagnosticData = $baddies->stats($diagnosticText);
	$view->outputDiagnosticData($diagnosticData);
}


$view->generateRestAndRollButtons('javascript:roll_dice();','javascript:reset_data();');



// Perform any forthcoming actions in BaddiedData object here



$view->createTable($data);

require('includes/footer.php');

unset($baddies);
unset($view);

?>


