<?php
require_once("EventInterface.php");
class Back3SquaresEvent implements EventInterface {
    public function run($game) {
        $currentPosition = $game->getCurrentPlayer()->getPosition();
        $currentPosition -= 3;
        echo "    ３マス戻ります。".$game->getCurrentPlayer()->name." は ".$currentPosition." マス目にいます。"."\n";
        $game->getCurrentPlayer()->setPosition($currentPosition);
    }
}
?>