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

namespace MikrotikAPI\Commands\IP;


use MikrotikAPI\Commands\IP\Firewall\Firewall;
use MikrotikAPI\Commands\IP\Hotspot\Hotspot;
use MikrotikAPI\Talker\Talker;


class IP {

    private $talker;

    function __construct(Talker $talker) {
        $this->talker = $talker;
    }

    public function Address() {
        return new Address($this->talker);
    }


    public function Hotspot() {
        return new Hotspot($this->talker);
    }

    public function Pool() {
        return new Pool($this->talker);
    }

    public function DNS() {
        return new DNS($this->talker);
    }

    public function Firewall() {
        return new Firewall($this->talker);
    }

    public function Accounting() {
        return new Accounting($this->talker);
    }

    public function ARP() {
        return new ARP($this->talker);
    }

    public function DHCPClient() {
        return new DHCPClient($this->talker);
    }

    public function DHCPRelay() {
        return new DHCPRelay($this->talker);
    }

    public function DHCPServer() {
        return new DHCPServer($this->talker);
    }

    public function Route() {
        return new Route($this->talker);
    }

    public function Service() {
        return new Service($this->talker);
    }

    public function WebProxy() {
        return new WebProxy($this->talker);
    }

}
