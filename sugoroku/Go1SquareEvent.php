<?php
require_once("EventInterface.php");
class Go1SquareEvent implements EventInterface {
    public function run($game) {
        $game->getCurrentPlayer()->position ++;
        echo "１マス進みます。".$game->getCurrentPlayer()->name." は ".$game->getCurrentPlayer()->position." マス目にいます。"."\n";
    }
}
?>