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
    public function addPlayer($player) {
        $this->players[]=$player;
        echo $player->id."人目のプレイヤーは".$player->name."です。"."\n";
    }

    public function setDice() {
        echo "サイコロの準備ができました。"."\n";
    }
    
    private $currentPlayer;
    public function getCurrentPlayer() {
        return $this->currentPlayer;
    }

    private function rollOnce() {
        $cp = $this->getCurrentPlayer();
        echo $cp->name." の番です。";
        $dice = Dice::rollDice();
        echo "サイコロの目は ".$dice." です。";
        $cp->position += $dice;
        echo $cp->name." は ".$cp->position." マス目にいます。"."\n";
    }
    private function goalCheck() {
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
                    $this->rollOnce();
                    $this->goalCheck();
                    $event = EventFactory::build($this->board->squares[$player->position]);
                    $event->run($this);
                    $player->currentDiceTime--;
                    while ($player->currentDiceTime != 0) {
                        $this->rollOnce();
                        $this->goalCheck();
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