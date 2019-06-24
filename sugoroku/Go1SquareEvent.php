<?php
require_once("EventInterface.php");
class Go1SquareEvent implements EventInterface {
    public function run($game) {
        $currentPosition = $game->getCurrentPlayer()->getPosition();
        $currentPosition ++;
        echo "    １マス進みます。".$game->getCurrentPlayer()->name." は ".$currentPosition." マス目にいます。"."\n";
        $game->getCurrentPlayer()->setPosition($currentPosition);
    }
}
?>