<?php
require_once("EventInterface.php");
class Go2SquaresEvent implements EventInterface {
    public function run($game){
        $currentPosition = $game->getCurrentPlayer()->getPosition();
        $currentPosition += 2;
        echo "    ２マス進みます。".$game->getCurrentPlayer()->name."は".$currentPosition."マス目にいます。"."\n";
        $game->getCurrentPlayer()->setPosition($currentPosition);
    }
}
?>