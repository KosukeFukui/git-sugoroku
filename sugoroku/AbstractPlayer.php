<?php
require_once("game.php");
abstract class AbstractPlayer {
    protected $position;

    abstract function yourTurn($game);
    abstract function endPhaseCheck($game);
    abstract function goalAction($game);

    public function getPosition() {
        return $this->position;
    }
    public function setPosition($position) {
        $this->position = $position;
    }
}
?>