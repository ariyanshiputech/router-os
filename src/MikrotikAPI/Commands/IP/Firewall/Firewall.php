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

namespace MikrotikAPI\Commands\IP\Firewall;

use MikrotikAPI\Talker\Talker;
use MikrotikAPI\Commands\IP\Firewall\Filter,
    MikrotikAPI\Commands\IP\Firewall\NAT,
    MikrotikAPI\Commands\IP\Firewall\Mangle,
    MikrotikAPI\Commands\IP\Firewall\ServicePort,
    MikrotikAPI\Commands\IP\Firewall\Connection,
    MikrotikAPI\Commands\IP\Firewall\AddressList,
    MikrotikAPI\Commands\IP\Firewall\Layer7Protocol;


class Firewall {

    
    private $talker;

    function __construct(Talker $talker) {
        $this->talker = $talker;
    }

    
    public function filter() {
        return new Filter($this->talker);
    }

    
    public function NAT() {
        return new NAT($this->talker);
    }

    
    public function mangle() {
        return new Mangle($this->talker);
    }

    
    public function servicePort() {
        return new ServicePort($this->talker);
    }

    
    public function connection() {
        return new Connection($this->talker);
    }

    
    public function addressList() {
        return new AddressList($this->talker);
    }

    
    public function layer7Protocol() {
        return new Layer7Protocol($this->talker);
    }

}
