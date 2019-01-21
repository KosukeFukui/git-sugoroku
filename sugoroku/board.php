<?php

class Board {

    public $board;

    public function __construct($board) {

        $lines = file("data/board.csv");

        $board = intval($lines[1]);

        $this -> board = $board;

        return $this;

        //var_dump($board);

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