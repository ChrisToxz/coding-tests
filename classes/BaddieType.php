<?php

class BaddieType {

	protected $_stats = array();

	protected $_baddieType;
	protected $_imageAndPath;

	protected $_minHealth;
	protected $_maxHealth;
	protected $_minStrength;
	protected $_maxStrength;	

	protected $_numberOfBaddies;
	protected $_baddieName;
	protected $_health;
	protected $_strength;
	protected $_specialPower;	

	protected $_baddieCount;
	protected $_powers;
	protected $_names;


	public function __construct() {

		$this->numberOfBaddies = count($this->_names);
		shuffle($this->_names);
		$this->_baddieCount = 0;
	
	}


	public function createAndGetStats(){

		self::generateChar();
		self::setPower();
		$this->_stats = array('name'=> $this->_baddieName, 
						'type' => $this->_baddieType,
						'image' => $this->_imageAndPath,
						'strength' => $this->_strength, 
						'health' => $this->_health,
						'power' =>$this->_specialPower
		);
	
	return $this->_stats;
}

	public function generateChar(){
		// Char names will be randomised and unique.
		// Currently chosen from a pool of 100 for each character
		// If run out of unique names(>100), reset

		$this->_health = mt_rand($this->_minHealth, $this->_maxHealth);
		$this->_strength = mt_rand($this->_minStrength, $this->_maxStrength);
		$this->_baddieName = $this->_names[$this->_baddieCount];
		$this->_baddieCount++;
		$this->_action = '';

		if($this->_baddieCount == $this->_numberOfBaddies){
			$this->_baddieCount = 0;
			shuffle($this->_names);
		}
	}


	protected function setPower(){
		// Powers set separately and are unique to class, but not to
		// individual character.

		$count = count($this->_powers);
		$count = mt_rand(0,$count - 1);
		$this->_specialPower = $this->_powers[$count];

	}
}