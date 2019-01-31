<?php
class EventFactory {
    public static function build ($square) {
        switch($square) {
            //case "":
                //return new Normal();
            case "RollAgain":
                return new RollAgainEvent();
            case "SkipNextTurn":
                return new SkipNextTurnEvent();
            case "Go1Square":
                return new Go1SquareEvent();
            case "Go2Squares":
                return new Go2SquaresEvent();
            case "Go3Squares":
                return new Go3SquaresEvent();
            case "Back1Square":
                return new Back1SquareEvent();
            case "Back2Squares":
                return new Back2SquaresEvent();
            case "Back3Squares":
                return new Back3SquaresEvent();
            case "BackToStart":
                return new BackToStartEvent();
            case "ChangePlaces":
                return new ChangePlacesEvent();
            default:
                return new NullEvent();
        }
    }
}
?>