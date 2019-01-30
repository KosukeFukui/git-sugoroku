<?php
class Board {
    public $boardData;
    public $boardLength;
    public function __construct($csvName) {
       $csvLines = file($csvName);
       //var_dump($csvLines);
       $csvLines = str_replace("\r\n", "", $csvLines);
       $csvBoardLength = explode(",", $csvLines[0]);
       $boardData = array_fill(0, 1 + $csvBoardLength[1], "");
       //var_dump($boardData);
       array_shift($csvLines);
       //var_dump($csvLines);
       foreach($csvLines as $csvLine) {
           $eachLineAsArray = explode(",", $csvLine);
           $eventName = $eachLineAsArray[0];
           array_shift($eachLineAsArray);
           //var_dump($eachLineAsArray);
           foreach($eachLineAsArray as $eventSquare) {
               $boardData[$eventSquare] = $eventName;
               //echo $eventSquare."\n";
               //echo $eventName."\n";
           }
       }
       //var_dump($boardData);
       $this->boardLength=$csvBoardLength[1];
       $this->boardData=$boardData;
    }
}
?>