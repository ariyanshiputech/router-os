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


class Ethernet {

    
    private $talker;

    function __construct(Talker $talker) {
        $this->talker = $talker;
    }

    
    public function getAll() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/interface/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        return $rs->getResultArray();
    }

    
    public function set($param, $id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/set");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    
    public function enable($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/enable");
        $sentence->where(".id", "=", $id);
        $enable = $this->talker->send($sentence);
        return "Sucsess";
    }

    
    public function disable($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/disable");
        $sentence->where(".id", "=", $id);
        $enable = $this->talker->send($sentence);
        return "Sucsess";
    }

    
    public function detail($id) {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/interface/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No Interface Ethernet With This id = " . $id;
        }
    }

}
