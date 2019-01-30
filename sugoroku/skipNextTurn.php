<?php
require_once("EventInterface.php");
class SkipNextTurn implements EventInterface {
    public function event($game) {
        $game->getCurrentPlayer()->nextDiceTime --;
        echo $game->getCurrentPlayer()->playerName."は次１回休みとなります。"."\n";
    }
}
?>