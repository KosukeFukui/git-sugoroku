<?php
class Board {
    public $squares;
    public $boardLength;
    public function __construct($csvName) {
        $file = new SplFileObject($csvName);
        $file->setFlags(SplFileObject::READ_CSV | SplFileObject::DROP_NEW_LINE);
        foreach ($file as $line) {
            $csvLines[] = $line;        
        }//var_dump($csvLines);exit;
        $boardLength = $csvLines[0];
        $squares = array_fill(0,$boardLength[1], "");
        array_shift($csvLines);
        foreach($csvLines as $csvLine) {
            $eventName = $csvLine[0];
            array_shift($csvLine);
            foreach($csvLine as $eventSquare) {
                $squares[$eventSquare] = $eventName;
            }
        }
        $this->squares=$squares;
    }
}
?>