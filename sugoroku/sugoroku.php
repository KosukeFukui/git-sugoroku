<?php
require_once("game.php");
require_once("board.php");
require_once("player.php");
require_once("dice.php");

$game = Game::getInstance();
$game->setBoard(new Board('data/board.csv'));
$game->addPlayer(new Player('Taro'));
$game->addPlayer(new Player('Jiro'));
$game->addPlayer(new Player('Saburo'));
$game->setDice(new Dice());
$game->start();
?>