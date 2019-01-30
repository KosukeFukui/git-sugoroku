<?php
require_once("EventInterface.php");
class Backward1Square implements EventInterface {
    public function event($game) {
        $game->getCurrentPlayer()->playerPosition --;
        echo "１マス戻ります。".$game->getCurrentPlayer()->playerName." は ".$game->getCurrentPlayer()->playerPosition." マス目にいます。"."\n";
    }
}
?>