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

        echo "�����낭�̃R�}����".$this -> board -> board."�ł��B"."\n";

    }

    

    public function addPlayer($playerName) {

        //$playerName = new Player();

        //var_dump($player->playerName);

        echo "�Z�l�ڂ̃v���C���[��".$playerName -> playerName."�ł��B"."\n";

    }



    public function setDice() {

        echo "�T�C�R���̏������ł��܂����B"."\n";

    }

    

    public function start() {

        echo '�Q�[�����n�߂܂��B'."\n";

    
//public function gameOn() {

        $playerSquares = array ('player1square'=>0, 'player2square'=>0);

        //var_dump($game);

        //var_dump($this -> board);

        //$until = $this -> board -> board;

        //var_dump($playerSquares['player1square']);

        //exit;

        while (max($playerSquares) < $this->board->board) {

            echo "1�l�ڂ̃v���C���[�̔Ԃł��B";

            $dice = Dice::rollDice();

            echo "�T�C�R���̖ڂ�".$dice."�ł��B";

            $playerSquares['player1square'] += $dice;

            //var_dump($playerSquare);

            echo "�v���C���[1��".$playerSquares['player1square']."�}�X�ڂɂ��܂��B"."\n";

            if ($playerSquares['player1square'] >= $this->board->board) {

                echo "�v���C���[1���S�[�����܂����B�v���C���[1�̏����ł��B";

                break;

            } else {

                echo "2�l�ڂ̃v���C���[�̔Ԃł��B";

                $dice = Dice::rollDice();

                echo "�T�C�R���̖ڂ�".$dice."�ł��B";

                $playerSquares['player2square'] += $dice;

                echo "�v���C���[2��".$playerSquares['player2square']."�}�X�ڂɂ��܂��B"."\n";

            }

            if ($playerSquares['player2square'] >= $this->board->board) {

                echo "�v���C���[2���S�[�����܂����B�v���C���[2�̏����ł��B";

                break;

            }

        //while (max($playerSquares) < $this->board->board) {

            //foreach ($playerSquares as $player => $playerSquare) {

                //echo "�Z�l�ڂ̃v���C���[�̔Ԃł��B";

                //$dice = Dice::rollDice();

                //echo "�T�C�R���̖ڂ�".$dice."�ł��B";

                //$playerSquare += $dice;

                //var_dump($playerSquare);

                //var_dump($playerSquares['player1square']);

                //exit;

                //if ($playerSquare >= $this->board->board) {

                //    echo "�S�[�����܂����B";

                //    exit;

                //}

            //}

        }

    }

}

?>