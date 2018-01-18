<?php

/**
 * Created by PhpStorm.
 * User: prince
 * Date: 18/01/18
 * Time: 13:50
 */
require "Numbers/Words.php";
class NumberToWords
{

    public static function toFr($val){
        $num = new Numbers_Words();
        return $num->toWords($val,'fr');
    }

}