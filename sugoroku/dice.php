<?php
class Dice{
    public static function rollDice() {
        $dice = rand(1,6);
        return $dice;
    }
}
?>