<?php
class Board {
    public $boardData;
    public function __construct($csvName) {
        $handle = fopen($csvName, "r");
        while ($boardData = fgetcsv($handle)) {
            $this->boardData=$boardData;
            return $this;
        }
        //var_dump($board);
        fclose($handle);
    }
    //$board = new Board();
    //public function setBoard($board) {
        //$board = 0;
        //var_dump($board);
        //$this -> board = $board;
        //$lines = file("data/board.csv");
        //$lines[1] = $board;
    //}
}
?>