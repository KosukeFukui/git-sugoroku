<?php
require_once("EventInterface.php");
class Backward3Squares implements EventInterface {
    public function event($game) {
        $game->getCurrentPlayer()->playerPosition -= 3;
        echo "３マス戻ります。".$game->getCurrentPlayer()->playerName." は ".$game->getCurrentPlayer()->playerPosition." マス目にいます。"."\n";
    }
}
?>