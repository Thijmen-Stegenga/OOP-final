<?php 

	require "Attack.php";
	require "Weakness.php";
	require "Resistance.php";
	require "Energytype.php";

	class Pokemon {
		public static $populationPokemons;
		private $name;
		private $energyType;
		private $hitPoints;
		private $health;
		private $attacks;
		private $weakness;
		private $resistance;
		
		public function __construct($name, $energyType, $hitPoints, $attacks, $weakness, $resistance) {
        	$this->name = $name;
        	$this->energyType = $energyType;
        	$this->hitPoints = $hitPoints;
        	$this->health = $hitPoints;
        	$this->attacks = $attacks;
        	$this->weakness = $weakness;
        	$this->resistance = $resistance;
			self::$populationPokemons++;
    	}
		
		public function attack($target, $attackNumber) {
			$target->receiveDamage($this->attacks[$attackNumber], $this->energyType);
			return $this->attacks[$attackNumber]->getName();
		}
		
		private function receiveDamage($attack, $energyType) {
			if ($energyType == $this->weakness->getWeaknessEnergytype()) {
				$attack->damage *= $this->weakness->getWeaknessMultiplier();
			}
			else if ($energyType == $this->resistance-> getResistanceEnergytype()) {
				$attack->damage -= $this->resistance-> getResistanceValue();
			}
			$this->health -= $attack->getDamage();
			if ($this->health <= 0) {
				self::$populationPokemons--;
			}
		}
		
		public static function getPopulation() {
			return self::$populationPokemons;
		}
		
		public function getName() {
			return $this->name;
		}
		
		public function getHealth() {
			return $this->health;
		}
		
		public function getHitpoints() {
			return $this->hitPoints;
		}	

		public function getEnergyType(){
			return $this->energyType;
		}

		public function getAttack(){
			return $this->attacks;
		}

		public function getWeakness(){
			return $this->weakness;
		}

		public function getResistance(){
			return $this->resistance;
		}

		
		public function stats(){
        return
        "Name: ". $this->getName(). "<br>".
        "Health: ". $this->getHitpoints()."<br>".
        "Energytype: ". $this->getEnergyType()->name."<br>".
        "Attacks:". $this->getAttack()[0]->getName()." (damage:". $this->getAttack()[0]->getDamage()."),  ". $this->getAttack()[1]->getName()." (damage:". $this->getAttack()[1]->getDamage().")<br>".
        "Weakness: ". $this->getWeakness()->getWeaknessEnergytype().", ".$this->getWeakness()->getWeaknessMultiplier()."<br>".
        "Resistance: ". $this->getResistance()->getResistanceEnergytype().", ". $this->getResistance()->getResistanceValue();
        }    
        
	}