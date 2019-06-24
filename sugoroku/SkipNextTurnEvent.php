<?php
require_once("EventInterface.php");
class SkipNextTurnEvent implements EventInterface {
    public function run($game) {
        if ($game->getCurrentPlayer()->currentDiceTime != 1) {
            $game->getCurrentPlayer()->nextDiceTime --;
            echo "    ".$game->getCurrentPlayer()->name."は次の１回休みとなります。"."\n";
        }
        $game->getCurrentPlayer()->currentDiceTime  = 0;
    }
}
?>