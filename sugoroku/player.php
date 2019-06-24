<?php
require_once("AbstractPlayer.php");
class Player extends AbstractPlayer {
    public $name;
    public $currentDiceTime;
    public $nextDiceTime;
    public static $count = 0;
    public $id;
    public $ogusiCounter;
    public $type;
    public function __construct($name) {
        $this->name = $name;
        $this->position = 0;
        $this->currentDiceTime = 1;
        $this->nextDiceTime = 1;
        self::$count++;
        $this->id = self::$count;
        $this->ogusiCounter = 0;
        $this->type = 0;
    }
    public function yourTurn($game) {
        $cp = $game->getCurrentPlayer();
        if ($cp->nextDiceTime != 1) {
            echo $cp->name."は休みです。"."\n";
            $cp->nextDiceTime ++;
            return;
        }
        if ($cp->ogusiCounter == 1) {
            $cp->position ++;
            echo $cp->name." の番です。".$cp->name."はしんどくて１マスしか進めない。".$cp->name." は ".$cp->position." マス目にいます。"."\n";
            $cp->currentDiceTime --;
            return;
        }
        echo $cp->name." の番です。";
        $diceResult = Dice::rollDice();
        echo "サイコロの目は ".$diceResult." です。";
        $cp->position += $diceResult;
        echo $cp->name." は ".$cp->position." マス目にいます。"."\n";
        $cp->currentDiceTime --;
    }
    public function endPhaseCheck($game) {
    }
    public function goalAction($game) {
    }
}
?>