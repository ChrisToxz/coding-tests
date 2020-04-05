<?php


class Snake extends BaddieType{

	

	protected $_baddieType = "Snake";
	protected $_imageAndPath = "images/snake.png";

	protected $_minStrength = 30;
	protected $_maxStrength = 90;
	protected $_minHealth = 60;
	protected $_maxHealth = 92;
	

	protected $_powers = array('Venom of Paralysis', 'Bite of Steel', 'Venom of Acid', 'Bite of Burning Pain', 
								'Choke of Doom', 'Choke of Mild Discomfort', 'Squeeze of the Taxman', 
								'Grip of Anguish', 'Speed of Lightning', 'Cunningness of a Cunning Thing',
								'Hiss of Terror', 'Slither of Silence', 'Overwhelming Crush', 
								'Grip of Death', 'Savage Strike', 'Pounce of Peril', 'Hiss of Thunder', 
								'Crush of Anger', 'Rattle of Terror', 'Pounce of Peircing', 
								'Chomp of Fear', 'Clamp of Hurt', 'Clamp of Pressure', 'Iron Clasp',
								'Clasp of Power', 'Throttle of Concentration', 'Hold of Peril',
								'Embrace of No Escape', 'Spitting Venom', 'Bite of Disorientation',
								'Sensitivity to Vibration');

	
	protected $_names = array('Sidney','Fang','Sircon','Snide','Gripper',
								'Fengtor', 'Slither', 'Vic', 'Jaws', 'Ernie', 
								'Choker', 'Benkor', 'Squeeza', 'Simak', 'Hisston',
								'Fangor', 'Venoma', 'Mengor', 'Slim', 'Rakmor', 
								'Samson', 'Sodus', 'Segnor', 'Jake', 'Venomode', 
								'Sandie', 'Seether', 'Finchy', 'Gove', 'Striker', 
								'Pouncer', 'Snart', 'Boa', 'Vipette', 'Scalar', 
								'Adderon', 'Wringer', 'Sandar', 'Anna', 'Vipor',
								'Asper', 'Riddick', 'Cascar', 'Kobey', 'Casparian',
								'Goldar', 'Harley', 'Mottle', 'Gopha', 'Keel',
								'Lance', 'Mocca', 'Patch', 'Py', 'Sawyer',
								'Pangon', 'Simson', 'King', 'Uri', 'Timba',
								'Renk', 'Vincent', 'Serpenta', 'Jeremy', 'Jonah',
								'Kren', 'Mancor', 'Keba', 'Jezzakyle', 'Kasp',
								'Stripe', 'Koil', 'Slidar', 'Simda', 'Bytor',
								'Modar', 'Krusha', 'Blake', 'Bangor', 'Vangar',
								'Modon', 'Slink', 'Glidor', 'Krawl', 'Squirm',
								'Sneak', 'Ceasar', 'Crunch', 'Chunk', 'Sarramir',
								'Pearson', 'Slasher', 'Munch', 'Snapen', 'Bayliff',
								'Razor', 'Sharpe', 'Sararn', 'Norris', 'Venn');


}