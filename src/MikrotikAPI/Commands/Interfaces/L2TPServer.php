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

use MikrotikAPI\Util\SentenceUtil,
    MikrotikAPI\Talker\Talker;


class L2TPServer {

    private $talker;

    function __construct(Talker $talker) {
        $this->talker = $talker;
    }

    
    public function add($param) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/l2tp-server/add");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        $this->talker->send($sentence);
        return "Sucsess";
    }

    
    public function disable($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/l2tp-server/disable");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    
    public function enable($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/l2tp-server/enable");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    
    public function delete($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/l2tp-server/remove");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    
    public function detail($id) {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/interface/l2tp-server/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No Interface L2TP Server With This id = " . $id;
        }
    }

    
    public function set($param, $id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/l2tp-server/set");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    
    public function getAll() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/interface/l2tp-server/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No Interface L2TP Server To Set, Please Your Add Interface L2TP Server";
        }
    }

    
    public function getAllServer() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/interface/l2tp-server/server/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No Interface L2TP Server Server To Set, Please Your Add Interface L2TP Server Server";
        }
    }

    
    public function setServer($param) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/l2tp-server/server/set");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        $this->talker->send($sentence);
        return "Sucsess";
    }

}
