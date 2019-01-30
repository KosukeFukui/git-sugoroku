<?php
require_once("game.php");
require_once("board.php");
require_once("player.php");
require_once("dice.php");
require_once("EventInterface.php");
require_once("eventFactory.php");
require_once("normal.php");
require_once("rollAgain.php");
require_once("skipNextTurn.php");
require_once("forward1square.php");
require_once("forward2squares.php");
require_once("forward3squares.php");
require_once("backward1square.php");
require_once("backward2squares.php");
require_once("backward3squares.php");
require_once("backToStart.php");
require_once("changePlaces.php");

$game = Game::getInstance();
$game->setBoard(new Board('data/board.csv'));
$game->addPlayer(new Player('Taro'));
$game->addPlayer(new Player('Jiro'));
$game->addPlayer(new Player('Saburo'));
$game->setDice(new Dice());
$game->start();
?>