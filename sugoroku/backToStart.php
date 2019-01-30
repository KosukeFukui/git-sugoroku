<?php
require_once("EventInterface.php");
class BackToStart implements EventInterface {
    public function event($game) {
        $game->getCurrentPlayer()->playerPosition = 0;
        echo "ふりだしに戻ります。".$game->getCurrentPlayer()->playerName." は ".$game->getCurrentPlayer()->playerPosition." マス目にいます。"."\n";
    }
}
?>