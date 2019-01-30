<?php
require_once("EventInterface.php");
class ChangePlaces implements EventInterface {
    public function event($game) {
        $randomPlayer = $game->players[array_rand($game->players)];
        while ($randomPlayer == $game->getCurrentPlayer()->playerName) {
            $randomPlayer = $game->players[array_rand($game->players)];
        }
        //var_dump($randomPlayer);
        list($game->getCurrentPlayer()->playerPosition, $randomPlayer->playerPosition)
            = [$randomPlayer->playerPosition, $game->getCurrentPlayer()->playerPosition];
        echo "    ".$game->getCurrentPlayer()->playerName."と".$randomPlayer->playerName."は場所を入れ替わりました。"."\n".
            "    ".$game->getCurrentPlayer()->playerName."は".$game->getCurrentPlayer()->playerPosition."マス目に移動し、".
            $randomPlayer->playerName."は".$randomPlayer->playerPosition."マス目に移動しました。"."\n";
    }
}
?>