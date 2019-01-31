<?php
require_once("EventInterface.php");
class Go3SquaresEvent implements EventInterface {
    public function run($game) {
        $game->getCurrentPlayer()->position += 3;
        echo "３マス進みます。".$game->getCurrentPlayer()->name." は ".$game->getCurrentPlayer()->position." マス目にいます。"."\n";
    }
}
?>