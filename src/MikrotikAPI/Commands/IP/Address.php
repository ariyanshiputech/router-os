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


use MikrotikAPI\Talker\Talker;
use MikrotikAPI\Util\SentenceUtil;

class Address {

    private $talker;

    function __construct(Talker $talker) {
        $this->talker = $talker;
    }

    public function add($param) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/address/add");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        $this->talker->send($sentence);
        return "Sucsess";
    }

    public function getAll() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/address/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No Ip Address To Set, Please Your Add Ip Address";
        }
    }

    public function enable($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/address/enable");
        $sentence->where(".id", "=", $id);
        $enable = $this->talker->send($sentence);
        return "Sucsess";
    }

    public function disable($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/address/disable");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    public function delete($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/address/remove");
        $sentence->where(".id", "=", $id);
        $enable = $this->talker->send($sentence);
        return "Sucsess";
    }

    public function set($param, $id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/address/set");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    public function detail_address($id) {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/address/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No Ip Address With This id = " . $id;
        }
    }

}
