<?php
require_once("EventInterface.php");
class RollAgain implements EventInterface {
    public function event($game){
        $game->getCurrentPlayer()->currentDiceTime++;
        echo "もう１度サイコロを振ってください。";
    }
}
?>