<?php 
namespace classes;

class Druide extends Character
{
    private $boost = False;
    private $useBoost = 1;

    public function attack(Character $target) {
        $rand = rand(1, 10);
        echo "{$this->boost}";
        if ($rand <= 6 || $this->boost) {
            return $this->sword($target);
        } else if ($rand == 10) {
            return $this->heal();
        } else if ($rand >= 7) {
            return $this->boost();
        } 
    }

    private function sword(Character $target) {
        $attack = rand(5, 15);
        if ($this->boost) {
            $attack *= 1.5;
            if($this->useBoost >= 3){
                $this->boost = false;
                $this->useBoost = 1;
            } else {
                $this->useBoost ++;
            }
            
        }
        $target->setLifePoints($attack);
        $status = "$this->name attaque {$target->name}! Il reste {$target->getLifePoints()} à {$target->name} !";
        return $status;
    }

    private function heal() {
        $status = "{$this->name} vient de soigner tous ses points de vie ! ";
        return $status;
        $this->lifePoints = 100;
    }

    private function boost() {
        $this->boost = true;
        $status = "{$this->name} vient d'invoquer la force de la forêt (dégt*1.5 pour 3 tour).";
        return $status;
    }
}