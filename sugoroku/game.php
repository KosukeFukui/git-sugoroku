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
    public function getOgusi() {
        foreach ($this->players as $player) {
            if ($player->name == "キングおぐしー") {
                return $player;
            }
        }
    }
    public function summonOgusi() {
        $this->getOgusi()->nextDiceTime = -4;
    }
    private function rollOnce() {
        $cp = $this->getCurrentPlayer();
        echo $cp->name." の番です。";
        $dice = Dice::rollDice();
        echo "サイコロの目は ".$dice." です。";
        $cp->position += $dice;
        echo $cp->name." は ".$cp->position." マス目にいます。"."\n";
    }
    private function ogusiRoll() {
        $cp = $this->getCurrentPlayer();
        echo $cp->name." の番です。".$cp->name."は１マスしか進めない。";
        $cp->position ++;
        echo $cp->name." は ".$cp->position." マス目にいます。"."\n";
    }
    private function goalCheck() {
        if ($this->getCurrentPlayer()->position >= count($this->board->squares)) {
            echo $this->getCurrentPlayer()->name."がゴールしました。"."\n";
            if ($this->getCurrentPlayer()->name == "キングおぐしー") {
                $this->changePlayerNames();
                $this->showResults();
            } else {
                $this->showResults();
            }
            exit;
        }
    }
    private function ogusiCheck() {
        if ($this->getCurrentPlayer()->position < $this->getOgusi()->position) {
            $this->getCurrentPlayer()->ogusiCounter = 1;
        }
    }
    private function showResults() {
        foreach ($this->players as $player) {
            $playerOrders[$player->name]=$player->position;
        }
        //var_dump($playerOrders);
        arsort($playerOrders);
        //var_dump($playerOrders);
        $playerPositionCount = array_count_values($playerOrders);
        //var_dump($playerPositionCount);
        $rank = 1;
        foreach ($playerPositionCount as $position=>$count) {
            for ($i = 0; $i < $count; $i++) {
                echo $rank."位は".array_keys($playerOrders)[$rank - 1 + $i]."です。"."\n";
                }
                $rank += $count;
        }
    }
    private function changePlayerNames() {
        foreach ($this->players as $player) {
            if ($player->name != "キングおぐしー") {
                $player->name = $player->name."オグシー";
            }
        }
    }
    public function start() {
        echo 'ゲームを始めます。'."\n";
        $this->summonOgusi();
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
                    $this->ogusiRoll();
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