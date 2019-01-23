<?php
class Player {
    public $playerName;
    public $playerSquare;
    public function __construct($playerName) {
        $this->playerName = $playerName;
        $this->playerSquare = 0;
    }
}
?>