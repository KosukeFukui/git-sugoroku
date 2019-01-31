<?php
require_once("EventInterface.php");
class Back2SquaresEvent implements EventInterface {
    public function run($game) {
        $game->getCurrentPlayer()->position -= 2;
        echo "２マス戻ります。".$game->getCurrentPlayer()->name." は ".$game->getCurrentPlayer()->position." マス目にいます。"."\n";
    }
}
?>