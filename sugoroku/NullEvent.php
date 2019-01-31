<?php
require_once("EventInterface.php");
class NullEvent implements EventInterface {
    public function run($game) {
    }
}
?>