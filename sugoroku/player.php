<?php
class Player {
    //public $player;
    //public static $playerNumber = 0;
    public function __construct($playerName) {
        $this -> playerName = $playerName;
        return $this;
        //self::$playerNumber++;
        //$this->playerNumber=$playerNumber;
    }
    //public $numberOfPlayers = 0;
    //public function countPlayer($numberOfPlayers) {
    //    self::$numberOfPlayers++;
    //    var_dump($numberOfPlayers);
        //echo "現在のプレイヤー数は".$numberOfPlayers."です。";
    //}
}
?>