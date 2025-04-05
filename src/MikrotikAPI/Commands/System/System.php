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

namespace MikrotikAPI\Commands\System;

use MikrotikAPI\Util\SentenceUtil,
    MikrotikAPI\Talker\Talker;


class System {

    
    private $talker;

    function __construct(Talker $talker) {
        $this->talker = $talker;
    }

    
    public function set_identity($name) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/system/identity/set");
        $sentence->setAttribute("name", $name);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    
    public function get_all_identity() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/system/identity/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        return $rs->getResultArray();
    }

    
    public function get_all_clock() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/system/clock/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        }
    }

    
    public function save_backup($name) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/system/backup/save");
        $sentence->setAttribute("name", $name);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    
    public function load_backup($name) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/system/backup/load");
        $sentence->setAttribute("name", $name);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    
    public function get_all_history() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/system/history/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No History";
        }
    }

    
    public function get_all_license() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/system/license/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        }
    }

    
    public function get_all_routerboard() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/system/routerboard/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        }
    }

    
    public function reset($keep_users, $no_defaults, $skip_backup) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/address/add");
        $sentence->setAttribute("keep-users", $keep_users);
        $sentence->setAttribute("no-defaults", $no_defaults);
        $sentence->setAttribute("skip-backup", $skip_backup);
        $this->talker->send($sentence);
        return "Sucsess";
    }

}
