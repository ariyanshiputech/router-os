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


class FirewallServicePort {


    private $talker;

    function __construct(Talker $talker) {
        $this->talker = $talker;
    }


    public function getAll() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/firewall/service-port/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No Ip Firewall service-port To Set, Please Your Add Ip Firewall service-port";
        }
    }


    public function disable($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/firewall/service-port/disable");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }


    public function enable($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/firewall/service-port/enable");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }


    public function detail($id) {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/firewall/service-port/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No Ip Firewall Service-Port With This id = " . $id;
        }
    }

}
