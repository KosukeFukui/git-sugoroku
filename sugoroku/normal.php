<?php
require_once("EventInterface.php");
class Normal implements EventInterface {
    public function event($game){
        echo $game->getCurrentPlayer()->playerName." の番です。";
        $dice = Dice::rollDice();
        echo "サイコロの目は ".$dice." です。";
        $game->getCurrentPlayer()->playerPosition += $dice;
        echo $game->getCurrentPlayer()->playerName." は ".$game->getCurrentPlayer()->playerPosition." マス目にいます。"."\n";
    }
}
?>