<?php
class Board {
    public $boardData;
    public $boardLength;
    public function __construct($csvName) {
        $handle = fopen($csvName, "r");
        while ($boardData = fgetcsv($handle)) {
            $this->boardData=$boardData;
        }
        fclose($handle);
    }
}
?>