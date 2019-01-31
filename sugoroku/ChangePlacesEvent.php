<?php
require_once("EventInterface.php");
class ChangePlacesEvent implements EventInterface {
    public function run($game) {
        $randomPlayer = 0;
        while ($randomPlayer == $game->getCurrentPlayer()->name) {
            $randomPlayer = $game->players[array_rand($game->players)];
        }
        
        $cpn = $game->getCurrentPlayer()->name;
        $cpp = $game->getCurrentPlayer()->position;
        $rpn = $randomPlayer->name;
        $rpp = $randomPlayer->position;
        //var_dump($randomPlayer);
        list($cpp, $rpp) = [$rpp, $cpp];
        echo "    ".$cpn."と".$rpn."は場所を入れ替わりました。"."\n".
            "    ".$cpn."は".$cpp."マス目に移動し、".$rpn."は".$rpp."マス目に移動しました。"."\n";
    }
}
?>