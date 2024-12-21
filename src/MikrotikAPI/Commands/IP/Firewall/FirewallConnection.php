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

use MikrotikAPI\Talker\Talker,
    MikrotikAPI\Util\SentenceUtil;


class FirewallConnection {

    
    private $talker;

    function __construct(Talker $talker) {
        $this->talker = $talker;
    }

    
    public function getAll() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/firewall/connection/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No Ip Firewall Connection To Set, Please Your Add Ip Firewall Connection";
        }
    }

    
    public function delete($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/firewall/connection/remove");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

}
