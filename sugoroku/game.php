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
    private function ogusiCheck() {
        if ($this->getCurrentPlayer()->position < $this->players[3]->position) {
            $this->getCurrentPlayer()->ogusiCounter = 1;
        }
    }
    private function showResults() {
        $results = array($this->players->name => $this->players->position);
        var_dump($results);
    }
    private function changePlayerName() {
        array_pop($this->players);
        foreach ($this->players as $player) {
            $player->name = $player->name."おぐしー";
        }
    }
    public function start() {
        echo 'ゲームを始めます。'."\n";
        $this->players[3]->nextDiceTime = -4;
        while (true) {
            foreach ($this->players as $player) {
                $this->currentPlayer = $player;
                $player->currentDiceTime = 1;
                $this->ogusiCheck();
                if ($player->nextDiceTime == 1 && $player->ogusiCounter == 0) {
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
                } elseif ($player->nextDiceTime == 1 && $player->ogusiCounter == 1) {
                    $player->position ++;
                    echo $player->name."の番です。１マス進みます。".$player->name."は".$player->position."マス目にいます。"."\n";
                    $this->goalCheck();
                    $event = EventFactory::build($this->board->squares[$player->position]);
                    $event->run($this);
                    $player->currentDiceTime--;
                    while ($player->currentDiceTime != 0) {
                        $player->position ++;
                        $this->goalCheck();
                        $player->currentDiceTime--;
                    }
                } else {
                    echo $player->name."は休みです。"."\n";
                    $player->nextDiceTime ++;
                }
            }
        }
    }
}
?>