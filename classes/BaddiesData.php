<?php


class BaddiesData {

	private $_stats = array();
	private $_indivChar = array();
	private $_numberOfBaddies;

	protected $_snake;
	protected $_troll;
	protected $_dragon;
	protected $_witch;

	private $_action = '';
	private $_validAction;
	private $_actionType;
	private $_numberFound;



	public function __construct($baddies) {

		$this->_numberOfBaddies = $baddies;
		$this->_validAction = false;

		// For detecting dodgy input via $_GET[]
		$this->_actionType = 'Not a valid action - a big cheat has been detected!';
		$this->_numberFound = 'Not a valid number - Some shenanigans are afoot!';

		// Used this approach so that unique character class 
		// names and class associated powers are assigned
		$this->_snake = new Snake();
		$this->_troll = new Troll();
		$this->_dragon = new Dragon();
		$this->_witch = new Witch();
	}


	public function createStats(){

		for($count = 0;$count<$this->_numberOfBaddies;$count++){

			self::generateChar(mt_rand(0,3));
			array_push($this->_stats, $this->_indivChar);
		}	

		return $this->_stats;
	}


	public function getStats() {
		return $this->_stats;
	}


	public function setStats($arr) {
		$this->_stats = $arr;
	}



	private function generateChar($charType){
		// Char names will be randomised and unique.
		// Currently chosen from a pool of 100 for each character

		switch ($charType) {
			case 0:
				$this->_indivChar = $this->_witch->createAndGetStats();
			break;
			case 1:
				$this->_indivChar = $this->_dragon->createAndGetStats();
			break;
			case 2:
				$this->_indivChar = $this->_snake->createAndGetStats();
			break;
			case 3:
				$this->_indivChar = $this->_troll->createAndGetStats();
			break;
		}
	}


	public function validateAction($value){
		
		$actionsAllowed = array('inc' => 'Increase Health',
								'dec' => 'Decrease Health',
								'del' => 'Delete Character');
								
		$this->_validAction = false;
		$this->_actionType = 'Not a valid action - a fruitless attempt at cheating has been detected!';

		if(array_key_exists($value, $actionsAllowed)) {
			$this->_validAction = true;
			$this->_actionType = $actionsAllowed[$value];
		}
	}


	public function getAction(){
		return $this->_actionType;
	}


	// Temporary, as no doubt the criteria will change 
	// later in the project if game characters are removed.
	// Use in_array() instead when characters are deleted
	public function validateCharIDNumber($number) {

		$isValid = false;
		$this->_numberFound = 'Not a valid number - some shenanigans are afoot!';

		if(is_numeric($number)) {
			$number = (int)$number;

			if(($number >= 1) && ($number <= (NUM_OF_BADDIES))){
				
				$isValid = true;
				$this->_numberFound = $number;

			}
		}

		return $isValid;
	}


	public function getCharacterIDNumber(){
		return $this->_numberFound;
	}


	public function stats($text) {

		$returnText = 'Set DIAGNOSTIC_MODE_ON to false\n';
		$returnText .= 'in index.php to disable this box\n\n';
		$returnText .= $text.'\n\n';

		return $returnText;
	}


	private function generateRandomPastelHexColour() {

		$min = 160;
		$max = 220;
		$red = mt_rand($min, $max);
		$green = mt_rand($min, $max);
		$blue = mt_rand($min, $max);

		$colour = sprintf("#%02x%02x%02x", $red, $green, $blue);

		return $colour;
	}

}