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

use MikrotikAPI\Talker\Talker,
    MikrotikAPI\Util\SentenceUtil;


class DHCPServer {


    private $talker;

    function __construct(Talker $talker) {
        $this->talker = $talker;
    }


    public function addNetwork($param) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/dhcp-server/network/add");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        $this->talker->send($sentence);
        return "Sucsess";
    }


    public function add($param) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/dhcp-server/add");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        $this->talker->send($sentence);
        return "Sucsess";
    }


    public function setConfig($store_leases_disk) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/dhcp-server/config/set");
        $sentence->setAttribute("store-leases-disk", $store_leases_disk);
        $this->talker->send($sentence);
        return "Sucsess";
    }


    public function setNetwork($param, $id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/dhcp-server/network/set");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }


    public function getAllNetwork() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/dhcp-server/network/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No Ip Dhcp-Server Network To Set, Please Your Add Ip Dhcp-Server Network";
        }
    }


    public function deleteNetwork($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/dhcp-server/network/remove");
        $sentence->where(".id", "=", $id);
        $enable = $this->talker->send($sentence);
        return "Sucsess";
    }


    public function detailNetwork($id) {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/dhcp-server/network/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No Ip Dhcp-Server Network With This id = " . $id;
        }
    }


    public function disable($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/dhcp-server/disable");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }


    public function enable($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/dhcp-server/enable");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }


    public function delete($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/dhcp-server/remove");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }


    public function set($param, $id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/dhcp-server/set");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }


    public function getAll() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/dhcp-server/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No Ip Dhcp-Server To Set, Please Your Add Ip Dhcp-Server";
        }
    }


    public function detail($id) {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/dhcp-server/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No Ip Dhcp-Server With This id = " . $id;
        }
    }

    public function getAllConfig() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/dhcp-server/config/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No Ip Dhcp-Server Config To Set, Please Your Add Ip Dhcp-Server Config";
        }
    }

}
