<?php
class Game {
    public function getInstance() {
        $game = new Game();
        return $game;
    }
    
    public $board;
    public function setBoard($board) {
        echo "すごろくのコマ数は".$board->boardLength."です。"."\n";
        $this->board=$board;
    }

    public $players;
    public function addPlayer($player) {
        $this->players[]=$player;
        echo Player::$playerNumber."人目のプレイヤーは".$player->playerName."です。"."\n";
    }

    public function setDice() {
        echo "サイコロの準備ができました。"."\n";
    }
    
    private $currentPlayer;
    public function getCurrentPlayer() {
        return $this->currentPlayer;
    }

    public function start() {
        echo 'ゲームを始めます。'."\n";
        while (true) {
            foreach ($this->players as $player) {
                $this->currentPlayer = $player;
                $player->currentDiceTime = 1;
                if ($player->nextDiceTime == 1) {
                    while ($player->currentDiceTime != 0) {
                        echo $player->playerName." の番です。";
                        $dice = Dice::rollDice();
                        echo "サイコロの目は ".$dice." です。";
                        $player->playerPosition += $dice;
                        echo $player->playerName." は ".$player->playerPosition." マス目にいます。"."\n";   
                        if ($player->playerPosition >= $this->board->boardLength) {
                            echo $player->playerName." がゴールしました。";
                            exit;
                        } elseif ($this->board->boardData[$player->playerPosition] != "") {
                            $event = EventFactory::build($this->board->boardData[$player->playerPosition]);
                            $event->event($this);
                        }
                        $player->currentDiceTime--;
                    }
                } else {
                    echo $player->playerName."は休みです。"."\n";
                    $player->nextDiceTime = 1;
                }
            }
        }
    }
}
?>