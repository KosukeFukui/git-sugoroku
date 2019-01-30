<?php
class EventFactory {
    public static function build ($square) {
        switch($square) {
            case "":
                return new Normal();
            case "rollAgain":
                return new RollAgain();
            case "skipNextTurn":
                return new SkipNextTurn();
            case "forward1square":
                return new Forward1Square();
            case "forward2squares":
                return new Forward2Squares();
            case "forward3squares":
                return new Forward3Squares();
            case "backward1square":
                return new Backward1Square();
            case "backward2squares":
                return new Backward2Squares();
            case "backward3squares":
                return new Backward3Squares();
            case "backToStart":
                return new BackToStart();
            case "changePlaces":
                return new ChangePlaces();
        }
    }
}
?>