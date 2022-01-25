<?php
	class Charmeleon extends Pokemon {
		
		public function __construct($name) {
			$energyType = new EnergyType(EnergyType::FIRE, EnergyType::FIRE);
			$hitPoints = 60;
			$attacks = [new Attack( 'Head Butt', 10), new Attack('Flare', 30)];
			$weakness = new Weakness( 2, 'Water');
		 	$resistance = new Resistance(10, EnergyType::LIGHTNING);
			parent:: __construct($name, $energyType, $hitPoints, $attacks, $weakness, $resistance);

	   }
	}