<?php

class Game {

    public function getInstance() {

        $game = new Game();

        return $game;

    }

    

    public $board;

    public function setBoard($board) {

        $this -> board = $board;

        //var_dump($board);

        echo "すごろくのコマ数は".$this -> board -> board."です。"."\n";

    }

    

    public function addPlayer($playerName) {

        //$playerName = new Player();

        //var_dump($player->playerName);

        echo "〇人目のプレイヤーは".$playerName -> playerName."です。"."\n";

    }



    public function setDice() {

        echo "サイコロの準備ができました。"."\n";

    }

    

    public function start() {

        echo 'ゲームを始めます。'."\n";

    
//public function gameOn() {

        $playerSquares = array ('player1square'=>0, 'player2square'=>0);

        //var_dump($game);

        //var_dump($this -> board);

        //$until = $this -> board -> board;

        //var_dump($playerSquares['player1square']);

        //exit;

        while (max($playerSquares) < $this->board->board) {

            echo "1人目のプレイヤーの番です。";

            $dice = Dice::rollDice();

            echo "サイコロの目は".$dice."です。";

            $playerSquares['player1square'] += $dice;

            //var_dump($playerSquare);

            echo "プレイヤー1は".$playerSquares['player1square']."マス目にいます。"."\n";

            if ($playerSquares['player1square'] >= $this->board->board) {

                echo "プレイヤー1がゴールしました。プレイヤー1の勝利です。";

                break;

            } else {

                echo "2人目のプレイヤーの番です。";

                $dice = Dice::rollDice();

                echo "サイコロの目は".$dice."です。";

                $playerSquares['player2square'] += $dice;

                echo "プレイヤー2は".$playerSquares['player2square']."マス目にいます。"."\n";

            }

            if ($playerSquares['player2square'] >= $this->board->board) {

                echo "プレイヤー2がゴールしました。プレイヤー2の勝利です。";

                break;

            }

        //while (max($playerSquares) < $this->board->board) {

            //foreach ($playerSquares as $player => $playerSquare) {

                //echo "〇人目のプレイヤーの番です。";

                //$dice = Dice::rollDice();

                //echo "サイコロの目は".$dice."です。";

                //$playerSquare += $dice;

                //var_dump($playerSquare);

                //var_dump($playerSquares['player1square']);

                //exit;

                //if ($playerSquare >= $this->board->board) {

                //    echo "ゴールしました。";

                //    exit;

                //}

            //}

        }

    }

}

?>