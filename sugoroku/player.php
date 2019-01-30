<?php
class Player {
    public $playerName;
    public $playerPosition;
    public $currentDiceTime;
    public $nextDiceTime;
    public static $playerNumber=0;
    public function __construct($playerName) {
        $this->playerName = $playerName;
        $this->playerPosition = 0;
        $this->currentDiceTime = 1;
        $this->nextDiceTime = 1;
        self::$playerNumber++;
    }
}
?>