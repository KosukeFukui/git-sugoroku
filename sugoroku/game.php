<?php
class Game {
    public static function getInstance() {
        $game = new Game();
        return $game;
    }
    
    private $board;
    public function setBoard($board) {
        echo "すごろくのコマ数は".$board->boardLength."です。"."\n";
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
    private function goalCheck() {
        //var_dump($this->getCurrentPlayer()->getPosition());
        if ($this->getCurrentPlayer()->getPosition() >= $this->board->boardLength) {
            echo $this->getCurrentPlayer()->name."がゴールしました。"."\n";
            $this->getCurrentPlayer()->goalAction($this);
            $this->showResults();
            exit;
        }
    }
    private function showResults() {
        foreach ($this->players as $player) {
            $playerOrders[$player->name]=$player->getPosition();
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
    public $turn;
    public function start() {
        echo 'ゲームを始めます。'."\n";
        $this->turn =0;
        while (true) {
            $this->turn ++;
            //var_dump($this->players);
            foreach ($this->players as $player) {
                $this->currentPlayer = $player;
                $player->currentDiceTime = 1;
                $player->yourTurn($this);
                $this->goalCheck();
                $event = EventFactory::build($this->board->squares[$player->getPosition()]);
                $event->run($this);
                $this->goalCheck();
                while ($player->currentDiceTime != 0) {
                    $player->yourTurn($this);
                    $this->goalCheck();
                }
                $player->endPhaseCheck($this);
            }
        }
    }
}
?>