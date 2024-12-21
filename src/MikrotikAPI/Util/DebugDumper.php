<?php
/*
*
 * @author      Ariyan Shipu 
 * @email ariyanshipuoffical@gmail.com 
 * @url <https://github.com/ariyanshipuofficial>
 * @copyright   Copyright (c) 2011, Virtual Think Team.
 * @license     http://opensource.org/licenses/gpl-license.php GNU Public License
 * @category	Libraries
 * 
 */

namespace MikrotikAPI\Util;


class DebugDumper {

    public static function dump($var, $detail = false) {
        if (is_array($var)) {
            if ($detail == false) {
                echo "<pre>";
                print_r($var);
                echo "</pre>";
            } else {
                echo "<pre>";
                var_dump($var);
                echo "</pre>";
            }
        } else {
            if ($detail == false) {
                echo "<pre>";
                echo $var;
                echo "</pre>";
            } else {
                echo "<pre>";
                var_dump($var);
                echo "</pre>";
            }
        }
    }

}
