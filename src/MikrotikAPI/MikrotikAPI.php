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

namespace MikrotikAPI;

use MikrotikAPI\Commands\File\File;
use MikrotikAPI\Commands\Interfaces\Interfaces;
use MikrotikAPI\Commands\IP\IP;
use MikrotikAPI\Commands\PPP\PPP;
use MikrotikAPI\Commands\System\System;
use MikrotikAPI\Commands\System\SystemScheduler;
use MikrotikAPI\Talker\Talker;


class MikrotikAPI {

    private $talker;

    function __construct(Talker $talker) {
        $this->talker = $talker;
    }

    public function IP() {
        return new IP($this->talker);
    }

    public function Interfaces()
    {
        return new Interfaces($this->talker);
    }
    public function PPP()
    {
        return new PPP($this->talker);
    }
    public function System()
    {
        return new System($this->talker);
    }

     public function File()
    {
        return new File($this->talker);
    }

    public function SystemSchedular()
    {
        return new SystemScheduler($this->talker);
    }


}
