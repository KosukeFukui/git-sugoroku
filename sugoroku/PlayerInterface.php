<?php
require_once("game.php");
interface PlayerInterface {
    public function yourTurn($game);
    public function endPhaseCheck($game);
    public function goalAction($game);
}
?>