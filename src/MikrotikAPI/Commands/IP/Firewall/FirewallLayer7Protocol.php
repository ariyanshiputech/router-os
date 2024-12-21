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


class FirewallLayer7Protocol {


    private $talker;

    function __construct(Talker $talker) {
        $this->talker = $talker;
    }


    public function add($param) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/firewall/layer7-protocol/add");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        $this->talker->send($sentence);
        return "Sucsess";
    }


    public function getAll() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/firewall/layer7-protocol/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No Ip Firewall Address List To Set, "
                    . "Please Your Add IP Firewall Layer7 Protocol ";
        }
    }


    public function enable($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/firewall/layer7-protocol/enable");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }


    public function disable($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/firewall/layer7-protocol/disable");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }


    public function delete($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/firewall/layer7-protocol/remove");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }


    public function set($param, $id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/firewall/layer7-protocol/set");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }


    public function detail($id) {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/firewall/layer7-protocol/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No IP Firewall Layer7 Protocol With This id = " . $id;
        }
    }

}
