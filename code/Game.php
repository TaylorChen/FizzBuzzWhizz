<?php

require_once (dirname(__FILE__) . "/../cfg/GameCfg.php");

/**
 * author cherry
 * desc Game Main Class
 * date 2014/4/29
 */
class Game {

    private $numbers = array();
    private $init_array_range = array();

    public function __construct($number_arrs, $init_array_range) {
        if (count($number_arrs) == 3) {
            $this->numbers = $number_arrs;
        }
        $this->init_array_range = $init_array_range;
    }

    /**
     * init data and call the doGame
     * @param <type> $init_array_range
     */
    public function startGame() {
        $init_array_range = $this->init_array_range;
        $numbers = $this->numbers;
        if (!empty($numbers)) {
            $count = count($init_array_range);
            for ($i = 0; $i < $count; $i++) {
                $this->doGame($numbers, $init_array_range[$i]);
            }
        }
    }

    /**
     * do Game form the pre-rules
     * @param <type> $i 
     */
    private function doGame($numbers, $i) {
        $str_contains = $this->numberContains($numbers, $i);
        if ($str_contains != null && $str_contains != "") {
            echo $str_contains . GameCfg::NEWLINE;
        } else {
            $msts = $this->numberMod($numbers, $i);
            if ($msts != "" && $msts != null) {
                echo $msts . GameCfg::NEWLINE;
            } else {
                echo $i . GameCfg::NEWLINE;
            }
        }
    }

    /**
     * Judge this number satisfy the rule 5 yes or not
     * @param <type> $numbers
     * @param <type> $i
     * @return <type>
     */
    private function numberContains($numbers, $i) {
        $ars = array();
        $intoarrays = $this->intToArray($i);
        $number_flag = $this->findFirstNumFlag($numbers, $intoarrays);
        if (in_array($numbers[GameCfg::ZERO], $intoarrays) && $number_flag) {
            array_push($ars, GameCfg::FIZZ);
        } else if (in_array($numbers[GameCfg::ONE], $intoarrays) && $number_flag) {
            if (count($ars) == 0) {
                array_push($ars, GameCfg::BUZZ);
            }
        } else if (in_array($numbers[GameCfg::TWO], $intoarrays) && $number_flag) {
            if (count($ars) == 0) {
                array_push($ars, GameCfg::WHIZZ);
            }
        }
        return implode("", $ars);
    }

    /**
     * Judge this number satisfy the rule 3,4 yes or not
     * @param <type> $numbers
     * @param <type> $i
     * @return <type>
     */
    private function numberMod($numbers, $i) {
        $ars = array();
        if ($i % $numbers[GameCfg::ZERO] == 0) {
            array_push($ars, GameCfg::FIZZ);
        }

        if ($i % $numbers[GameCfg::ONE] == 0) {
            array_push($ars, GameCfg::BUZZ);
        }

        if ($i % $numbers[GameCfg::TWO] == 0) {
            array_push($ars, GameCfg::WHIZZ);
        }
        return implode("", $ars);
    }

    private function intToArray($val) {
        $input_arrs = array();
        $val = $val . "";
        $len = strlen($val);

        for ($i = 0; $i < $len; $i++) {
            array_push($input_arrs, $val{$i});
        }
        return $input_arrs;
    }

//    private function findFirstNumFlag($numbers, $intoarrays) {
//        $exist_flag = false;
//        foreach ($intoarrays as $index => $in) {
//            if ($in == $numbers[GameCfg::ZERO]) {
//                $exist_flag = true;
//                break;
//            }
//        }
//        return $exist_flag;
//    }
    private function findFirstNumFlag($numbers, $intoarrays) {
        return in_array($numbers[GameCfg::ZERO], $intoarrays);
    }

}

?>
