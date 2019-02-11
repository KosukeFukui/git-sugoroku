<?php
require_once("game.php");
interface GameInterface {
    public function yourTurn($game);
    public function endPhaseCheck($game);
    public function goalAction($game);
}
?>