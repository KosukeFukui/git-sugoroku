<?php
require_once("EventInterface.php");
class BackToStartEvent implements EventInterface {
    public function run($game) {
        $currentPosition = $game->getCurrentPlayer()->getPosition();
        $currentPosition = 0;
        echo "    ふりだしに戻ります。".$game->getCurrentPlayer()->name." は ".$currentPosition." マス目にいます。"."\n";
        $game->getCurrentPlayer()->setPosition($currentPosition);
    }
}
?>