<?php
require_once("EventInterface.php");
class Back1SquareEvent implements EventInterface {
    public function run($game) {
        $game->getCurrentPlayer()->position --;
        echo "１マス戻ります。".$game->getCurrentPlayer()->name." は ".$game->getCurrentPlayer()->position." マス目にいます。"."\n";
    }
}
?>