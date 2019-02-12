<?php
class KingOgusi extends Player {
    public function __construct($name) {
        $this->name = $name;
        $this->position = 0;
        $this->currentDiceTime = 1;
        $this->nextDiceTime = -4;
        self::$count++;
        $this->id = self::$count;
    }
    public function yourTurn($game) {
        $cp = $game->getCurrentPlayer();
        if ($cp->nextDiceTime == 1) {
            echo $cp->name." の番です。";
            $diceResult = Dice::rollDice();
            echo "サイコロの目は ".$diceResult." です。";
            $cp->position += $diceResult;
            echo $cp->name." は ".$cp->position." マス目にいます。"."\n";
            $cp->currentDiceTime --;
        } elseif ($game->turn <= 5) {
            echo $cp->name."は休みです。"."\n";
            $cp->nextDiceTime ++;
            $cp->currentDiceTime = 0;
        } else {
            echo $cp->name."は休みです。"."\n";
            $cp->nextDiceTime ++;
        } 
    }
    public function endPhaseCheck($game) {
        $cp = $game->getCurrentPlayer();
        foreach ($game->players as $player) {
            if ($cp->position > $player->position && $player->ogusiCounter == 0) {
                $player->ogusiCounter = 1;
                echo "    ".$player->name."は".$cp->name."にインフルをうつされ、体調が悪化した。"."\n";
            }
        }
    }
    public function goalAction($game) {
        foreach ($game->players as $player) {
            if ($player->name != "キングおぐしー") {
                $player->name = $player->name."オグシー";
            }
        }
    }
}
?>
