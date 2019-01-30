<?php
require_once("EventInterface.php");
class Forward2Squares implements EventInterface {
    public function event($game){
        $game->getCurrentPlayer()->playerPosition += 2;
        echo "２マス進みます。".$game->getCurrentPlayer()->playerName."は".$game->getCurrentPlayer()->playerPosition."マス目にいます。"."\n";
    }
}
?>