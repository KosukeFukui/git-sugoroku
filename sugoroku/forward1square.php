<?php
require_once("EventInterface.php");
class Forward1Square implements EventInterface {
    public function event($game) {
        $game->getCurrentPlayer()->playerPosition ++;
        echo "１マス進みます。".$game->getCurrentPlayer()->playerName." は ".$game->getCurrentPlayer()->playerPosition." マス目にいます。"."\n";
    }
}
?>