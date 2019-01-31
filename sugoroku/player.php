<?php
class Player {
    public $name;
    public $position;
    public $currentDiceTime;
    public $nextDiceTime;
    public static $count = 0;
    public $id;
    public function __construct($name) {
        $this->name = $name;
        $this->position = 0;
        $this->currentDiceTime = 1;
        $this->nextDiceTime = 1;
        self::$count++;
        $this->id = self::$count;
    }
}
?>