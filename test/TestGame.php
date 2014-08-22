<?php

require_once (dirname(__FILE__) . "/../code/Game.php");

$number_arrs = array(3, 5, 7);
$init_array_range = array();

for ($i = 0; $i < 100; $i++) {
    $init_array_range[$i] = $i + 1;
}

$game = new Game($number_arrs, $init_array_range);
$game->startGame();
//echo "<pre>";
//print_r(get_defined_constants());
//echo "</pre>";
?>
