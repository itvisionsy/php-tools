<?php

namespace ItvisionSy\Tools;

/**
 * A general set of methods
 *
 * @author muhannad
 */
class Ops {

    /**
     * Apply filters to the value
     * 
     * @param scalar $value the value to modify
     * @param $modify1, $modify2, ... any 1-parameter simple callable can be used to modify the value
     * @return scalar the value after modifications
     */
    public static function modify($value) {
        $modifiers = func_get_args();
        for ($i = 1; $i < count($modifiers); $i++) {
            $func = "\\{$modifiers[$i]}";
            $value = call_user_func_array($func, [$value]);
        }
        return $value;
    }

    /**
     * Returns the order suffix for the number. i.e. st, nd, rd, th, ... optionally with the number
     * 
     * @param number $number the number to be ordered
     * @param boolean $whole wheither to return the whole number i.e. 1st, or just the suffix i.e. st
     * @return string
     */
    public static function number2Order($number, $whole = true) {
        $value = (int) $number;
        $suffix = "th";
        if ($value % 10 === 1) {
            $suffix = "st";
        }
        if ($value % 10 === 2) {
            $suffix = "nd";
        }
        if ($value % 10 === 3) {
            $suffix = "rd";
        }
        return $whole ? "{$value}{$suffix}" : $suffix;
    }

}
