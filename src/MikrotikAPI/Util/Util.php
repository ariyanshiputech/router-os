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

class Util {

    public static function contains($string, $needle) {
        $pos = strpos($string, $needle);
        if (!($pos === FALSE)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
