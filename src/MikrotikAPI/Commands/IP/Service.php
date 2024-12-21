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


class Service {

    private $talker;

    function __construct(Talker $talker) {
        $this->talker = $talker;
    }

    
    public function getAll() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/service/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No Ip Service To Set, Please Your Add Ip Service";
        }
    }

    
    public function enable($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/service/enable");
        $sentence->where(".id", "=", $id);
        $enable = $this->talker->send($sentence);
        return "Sucsess";
    }

    
    public function disable($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/service/disable");
        $sentence->where(".id", "=", $id);
        $enable = $this->talker->send($sentence);
        return "Sucsess";
    }

    
    public function detail($id) {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/service/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No Ip Service With This id = " . $id;
        }
    }

    
    public function set($param, $id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/service/set");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

}
