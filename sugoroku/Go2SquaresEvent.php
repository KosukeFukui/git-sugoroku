<?php
require_once("EventInterface.php");
class Go2SquaresEvent implements EventInterface {
    public function run($game){
        $game->getCurrentPlayer()->position += 2;
        echo "２マス進みます。".$game->getCurrentPlayer()->name."は".$game->getCurrentPlayer()->position."マス目にいます。"."\n";
    }
}
?>