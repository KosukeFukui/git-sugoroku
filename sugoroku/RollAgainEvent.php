<?php
require_once("EventInterface.php");
class RollAgainEvent implements EventInterface {
    public function run($game){
        $game->getCurrentPlayer()->currentDiceTime = 1;
        echo "    もう１度サイコロを振ってください。";
    }
}
?>