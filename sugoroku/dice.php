<?php
class Dice{
    public function rollDice() {
        $dice = rand(1,6);
        return $dice;
    }
}
?>