<?php
require_once("EventInterface.php");
class BackToStartEvent implements EventInterface {
    public function run($game) {
        $game->getCurrentPlayer()->position = 0;
        echo "ふりだしに戻ります。".$game->getCurrentPlayer()->name." は ".$game->getCurrentPlayer()->position." マス目にいます。"."\n";
    }
}
?>