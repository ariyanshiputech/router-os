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

namespace MikrotikAPI\Commands\IP\Hotspot;

use MikrotikAPI\Talker\Talker,
    MikrotikAPI\Util\SentenceUtil;


class HotspotActive {

    private $talker;

    function __construct(Talker $talker) {
        $this->talker = $talker;
    }


    public function add($param) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/hotspot/active/add");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        $this->talker->send($sentence);
        return "Sucsess";
    }

    public function login($param) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/hotspot/active/login");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        $this->talker->send($sentence);
        return "Sucsess";
    }


    public function delete($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/hotspot/active/remove");
        $sentence->where(".id", "=", $id);
        $enable = $this->talker->send($sentence);
        return "Sucsess";
    }


    public function getAll() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/hotspot/active/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No IP Hotspot Active To Set, Please Your Add IP Hotspot Active";
        }
    }


    public function detail($id) {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/hotspot/active/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No IP Hotspot Active With This id = " . $id;
        }
    }

    public function get_active($user) {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/hotspot/active/print");
        $sentence->where("user", "=", $user);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No IP Hotspot Active With This id = " . $user;
        }
    }

}
