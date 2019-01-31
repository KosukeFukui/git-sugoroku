<?php
require_once("EventInterface.php");
class Normal implements EventInterface {
    public function run($game){
        echo $game->getCurrentPlayer()->name." の番です。";
        $dice = Dice::rollDice();
        echo "サイコロの目は ".$dice." です。";
        $game->getCurrentPlayer()->position += $dice;
        echo $game->getCurrentPlayer()->name." は ".$game->getCurrentPlayer()->position." マス目にいます。"."\n";
    }
}
?>