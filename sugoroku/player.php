<?php
require_once("PlayerInterface.php");
class Player implements PlayerInterface {
    public $name;
    protected $position;
    public $currentDiceTime;
    public $nextDiceTime;
    public static $count = 0;
    public $id;
    public $ogusiCounter;
    public function __construct($name) {
        $this->name = $name;
        $this->position = 0;
        $this->currentDiceTime = 1;
        $this->nextDiceTime = 1;
        self::$count++;
        $this->id = self::$count;
        $this->ogusiCounter = 0;
    }
    public function getPosition() {
        return $this->position;
    }
    public function setPosition($position) {
        $this->position = $position;
    }
    public function yourTurn($game) {
        $cp = $game->getCurrentPlayer();
        if ($cp->nextDiceTime == 1) {
            if ($cp->ogusiCounter == 0) {
                echo $cp->name." の番です。";
                $diceResult = Dice::rollDice();
                echo "サイコロの目は ".$diceResult." です。";
                $cp->position += $diceResult;
                echo $cp->name." は ".$cp->position." マス目にいます。"."\n";
            } else {
                $cp->position ++;
                echo $cp->name." の番です。".$cp->name."はしんどくて１マスしか進めない。".$cp->name." は ".$cp->position." マス目にいます。"."\n";
            }
            $cp->currentDiceTime --;
        } else {
            echo $cp->name."は休みです。"."\n";
            $cp->nextDiceTime ++;
        } 
    }
    public function endPhaseCheck($game) {
    }
    public function goalAction($game) {
    }
}
?>