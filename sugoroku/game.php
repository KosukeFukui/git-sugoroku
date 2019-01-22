<?php
class Game {
    public function getInstance() {
        $game = new Game();
        return $game;
    }
    
    public $board;
    public function setBoard() {
        $board = $board;
        //var_dump($board);
        echo "すごろくのコマ数は".$this -> boardLength."です。"."\n";
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
        $playerSquares = array ('Taro'=>0, 'Jiro'=>0,'Saburo'=>0);
        //$rollerNames=array('Taro', 'Jiro', 'Saburo')
        //var_dump($game);
        //var_dump($this -> board);
        //$until = $this -> board -> board;
        //var_dump($playerSquares['player1square']);
        //exit;
        //while (max($playerSquares) < $this->board->board) {
            //echo "1人目のプレイヤーの番です。";
            //$dice = Dice::rollDice();
            //echo "サイコロの目は".$dice."です。";
            //$playerSquares['player1square'] += $dice;
            //var_dump($playerSquare);
            //echo "プレイヤー1は".$playerSquares['player1square']."マス目にいます。"."\n";
            //if ($playerSquares['player1square'] >= $this->board->board) {
                //echo "プレイヤー1がゴールしました。プレイヤー1の勝利です。";
                //break;
            //} else {
                //echo "2人目のプレイヤーの番です。";
                //$dice = Dice::rollDice();
                //echo "サイコロの目は".$dice."です。";
                //$playerSquares['player2square'] += $dice;
                //echo "プレイヤー2は".$playerSquares['player2square']."マス目にいます。"."\n";
            //}
            //if ($playerSquares['player2square'] >= $this->board->board) {
                //echo "プレイヤー2がゴールしました。プレイヤー2の勝利です。";
                //break;
            //}
        while (max($playerSquares) < $this->board->board) {
            foreach ($playerSquares as $rollerName => $playerSquare) {
                echo $rollerName."の番です。";
                $dice = Dice::rollDice();
                echo "サイコロの目は".$dice."です。";
                $playerSquares[$rollerName] += $dice;
                echo $rollerName."は".$playerSquares[$rollerName]."マス目にいます。"."\n";
                //var_dump($playerSquare);
                //var_dump($playerSquares['player1square']);
                //exit;
                if ($playerSquares[$rollerName] >= $this->board->board) {
                    echo $rollerName."がゴールしました。";
                    exit;
                }
            }
        }
    }
}
?>