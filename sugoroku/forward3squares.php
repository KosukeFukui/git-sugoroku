<?php
require_once("EventInterface.php");
class Forward3Squares implements EventInterface {
    public function event($game) {
        $game->getCurrentPlayer()->playerPosition += 3;
        echo "３マス進みます。".$game->getCurrentPlayer()->playerName." は ".$game->getCurrentPlayer()->playerPosition." マス目にいます。"."\n";
    }
}
?>