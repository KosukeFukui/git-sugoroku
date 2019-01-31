<?php
class Game {
    public function getInstance() {
        $game = new Game();
        return $game;
    }
    
    public $board;
    public function setBoard($board) {
        echo "すごろくのコマ数は".count($board->squares)."です。"."\n";
        $this->board=$board;
    }

    public $players;
    public function getHowManyPlayers() {
        return count($this->players);
    }
    public function addPlayer($player) {
        $this->players[]=$player;
        echo $this->getHowManyPlayers()."人目のプレイヤーは".$player->name."です。"."\n";
    }

    public function setDice() {
        echo "サイコロの準備ができました。"."\n";
    }
    
    private $currentPlayer;
    public function getCurrentPlayer() {
        return $this->currentPlayer;
    }

    public function goalCheck() {
        if ($this->getCurrentPlayer()->position >= count($this->board->squares)) {
            echo $this->getCurrentPlayer()->name."がゴールしました。"."\n";
            exit;
        }
    }
    public function start() {
        echo 'ゲームを始めます。'."\n";
        while (true) {
            foreach ($this->players as $player) {
                $this->currentPlayer = $player;
                $player->currentDiceTime = 1;
                if ($player->nextDiceTime == 1) {
                    while ($player->currentDiceTime != 0) {
                        echo $player->name." の番です。";
                        $dice = Dice::rollDice();
                        echo "サイコロの目は ".$dice." です。";
                        $player->position += $dice;
                        echo $player->name." は ".$player->position." マス目にいます。"."\n";
                        $this->goalCheck();   
                        if ($this->board->squares[$player->position] != "") {
                            $event = EventFactory::build($this->board->squares[$player->position]);
                            $event->run($this);
                            $this->goalCheck();
                        } 
                        $player->currentDiceTime--;
                    }
                } else {
                    echo $player->name."は１回休みです。"."\n";
                    $player->nextDiceTime = 1;
                }
            }
        }
    }
}
?>