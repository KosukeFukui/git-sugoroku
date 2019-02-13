<?php
require_once("game.php");
require_once("board.php");
require_once("AbstractPlayer.php");
require_once("player.php");
require_once("kingOgusi.php");
require_once("dice.php");
require_once("EventInterface.php");
require_once("EventFactory.php");
require_once("RollAgainEvent.php");
require_once("SkipNextTurnEvent.php");
require_once("Go1SquareEvent.php");
require_once("Go2SquaresEvent.php");
require_once("Go3SquaresEvent.php");
require_once("Back1SquareEvent.php");
require_once("Back2SquaresEvent.php");
require_once("Back3SquaresEvent.php");
require_once("BackToStartEvent.php");
require_once("ChangePlacesEvent.php");
require_once("NullEvent.php");
//require_once("result.php");

$game = Game::getInstance();
$game->setBoard(new Board('data/board.csv'));
$game->addPlayer(new Player('Taro'));
$game->addPlayer(new Player('Jiro'));
$game->addPlayer(new Player('Saburo'));
$game->addPlayer(new kingOgusi('キングおぐしー'));
$game->setDice(new Dice());
$game->start();
?>