 <?php
require_once("EventInterface.php");
class ChangePlacesEvent implements EventInterface {
    public function run($game) {
        $randomPlayerId = 1;
       
        if ($game->turn <= 5) {
            $game->players = $game->normalPlayers;
        } else {
            $game->players = $game->allPlayers;
        }
        do {
        $randomPlayerId = $game->players[array_rand($game->players)]->id;
        } while ($randomPlayerId == $game->getCurrentPlayer()->id);
        
        $randomPlayer = $game->players[$randomPlayerId-1];
        $cpn = $game->getCurrentPlayer()->name;
        $cpp = $game->getCurrentPlayer()->getPosition();
        $rpn = $randomPlayer->name;
        $rpp = $randomPlayer->getPosition(); 

        list($cpp, $rpp) = [$rpp, $cpp];
        $ncpp = $game->getCurrentPlayer()->getPosition();
        $ncpp = $cpp;
        $nrpp = $randomPlayer->getPosition();
        $nrpp = $rpp;

        echo "    ".$cpn."と".$rpn."は場所を入れ替わります。"."\n".
            "    ".$cpn."は".$ncpp."マス目に移動し、".$rpn."は".$nrpp."マス目に移動しました。"."\n";

        $game->getCurrentPlayer()->setPosition($ncpp);
        $randomPlayer->setPosition($nrpp);
    }
}
?>