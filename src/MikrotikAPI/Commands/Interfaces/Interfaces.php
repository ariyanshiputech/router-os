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

namespace MikrotikAPI\Commands\Interfaces;

use MikrotikAPI\Talker\Talker;
use MikrotikAPI\Commands\Interfaces\Bonding,
    MikrotikAPI\Commands\Interfaces\EoIP,
    MikrotikAPI\Commands\Interfaces\Ethernet,
    MikrotikAPI\Commands\Interfaces\IPTunnel,
    MikrotikAPI\Commands\Interfaces\L2TPClient,
    MikrotikAPI\Commands\Interfaces\L2TPServer,
    MikrotikAPI\Commands\Interfaces\PPPClient,
    MikrotikAPI\Commands\Interfaces\PPPServer,
    MikrotikAPI\Commands\Interfaces\PPPoEClient,
    MikrotikAPI\Commands\Interfaces\PPPoEServer,
    MikrotikAPI\Commands\Interfaces\PPTPClient,
    MikrotikAPI\Commands\Interfaces\PPTPServer,
    MikrotikAPI\Commands\Interfaces\VLAN,
    MikrotikAPI\Commands\Interfaces\VRRP;


class Interfaces {

    
    private $talker;

    function __construct(Talker $talker) {
        $this->talker = $talker;
    }

    
    public function ethernet() {
        return new Ethernet($this->talker);
    }

    
    public function PPPoEClient() {
        return new PPPoEClient($this->talker);
    }

    
    public function PPPoEServer() {
        return new PPPoEServer($this->talker);
    }

    
    public function EoIP() {
        return new EoIP($this->talker);
    }

    
    public function IPTunnel() {
        return new IPTunnel($this->talker);
    }

    
    public function VLAN() {
        return new VLAN($this->talker);
    }

    
    public function VRRP() {
        return new VRRP($this->talker);
    }

    
    public function bonding() {
        return new Bonding($this->talker);
    }

    
    public function bridge() {
        return new Bridge($this->talker);
    }

    
    public function L2TPClient() {
        return new L2TPClient($this->talker);
    }

    
    public function L2TPServer() {
        return new L2TPServer($this->talker);
    }

    
    public function PPPClient() {
        return new PPPClient($this->talker);
    }

    
    public function PPPServer() {
        return new PPPServer($this->talker);
    }

    
    public function PPTPClient() {
        return new PPTPClient($this->talker);
    }

    
    public function PPTPServer() {
        return new PPTPServer($this->talker);
    }

}
