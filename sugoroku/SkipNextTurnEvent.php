<?php
require_once("EventInterface.php");
class SkipNextTurnEvent implements EventInterface {
    public function run($game) {
        $game->getCurrentPlayer()->nextDiceTime --;
        echo "    ".$game->getCurrentPlayer()->name."は次の１回休みとなります。"."\n";
    }
}
?>