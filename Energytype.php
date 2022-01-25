<?php 
	class EnergyType {

		const FIRE = 'Fire';
		const LIGHTNING = 'Lightning';

		public $name;
		public $energyTypeValue;

		public function __construct($name, $energyTypeValue) {
		 	$this->name = $name;
		 	$this->energyTypeValue = $energyTypeValue;
		 }
	}