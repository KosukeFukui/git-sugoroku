<?php

require_once("game.php");

require_once("board.php");

require_once("player.php");

require_once("dice.php");



$game = Game::getInstance();

//echo 'ƒQ[ƒ€‚Ì’†g';

//var_dump($game);

$game->setBoard(new Board('data/board.csv'));

$game->addPlayer(new Player('Taro'));

$game->addPlayer(new Player('Jiro'));

$game->setDice(new Dice());

$game->start();

//$game->gameOn();

//Game::gameOn($game);

?>
