<?php
require_once("EventInterface.php");
class Back2SquaresEvent implements EventInterface {
    public function run($game) {
        $currentPosition = $game->getCurrentPlayer()->getPosition();
        $currentPosition -= 2;
        echo "    ２マス戻ります。".$game->getCurrentPlayer()->name." は ".$currentPosition." マス目にいます。"."\n";
        $game->getCurrentPlayer()->setPosition($currentPosition);
    }
}
?>