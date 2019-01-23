<?php
class Game {
    public function getInstance() {
        $game = new Game();
        return $game;
    }
    
    public $board;
    public function setBoard($board) {
        $board->boardLength = $board->boardData[0];
        echo "すごろくのコマ数は".$board->boardLength."です。"."\n";
        $this->board=$board;
    }

    public $players;
    public function addPlayer($player) {
        echo "〇人目のプレイヤーは".$player->playerName."です。"."\n";
        $this->players[]=$player;
    }

    public function setDice() {
        echo "サイコロの準備ができました。"."\n";
    }
    
    public function start() {
        echo 'ゲームを始めます。'."\n";
        while (true) {
            foreach ($this->players as $player) {
                $diceTime = 1;
                while ($diceTime != 0) {
                    echo $player->playerName." の番です。";
                    $dice = Dice::rollDice();
                    echo "サイコロの目は ".$dice." です。";
                    $player->playerSquare += $dice;
                    echo $player->playerName." は ".$player->playerSquare." マス目にいます。"."\n";
                    if ($player->playerSquare >= $this->board->boardLength) {
                        echo $player->playerName." がゴールしました。";
                        exit;
                    } elseif (in_array($player->playerSquare, $this->board->boardData)) {
                        $diceTime++;
                    }
                    $diceTime--;
                }
            } //if (max($this->players) >= $this->board->boardLength) {
                //break;
            //}
        }
    }
}
?>