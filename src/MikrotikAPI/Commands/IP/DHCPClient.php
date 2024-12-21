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


class DHCPClient {

    
    private $talker;

    function __construct(Talker $talker) {
        $this->talker = $talker;
    }

    
    public function add($param) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/dhcp-client/add");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        $this->talker->send($sentence);
        return "Sucsess";
    }

    
    public function disable($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/dhcp-client/disable");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    
    public function enable($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/dhcp-client/enable");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    
    public function renew_dhcp_client($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/dhcp-client/renew");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    
    public function release_dhcp_client($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/dhcp-client/release");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    
    public function set_dhcp_client($param, $id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/dhcp-client/set");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    
    public function delete_dhcp_client($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/dhcp-client/remove");
        $sentence->where(".id", "=", $id);
        $enable = $this->talker->send($sentence);
        return "Sucsess";
    }

    
    public function getAll() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/dhcp-client/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No Ip Dhcp-Client To Set, Please Your Add Ip Dhcp-Client";
        }
    }

    
    public function detail($id) {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/dhcp-client/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No Ip Dhcp-Client With This id = " . $id;
        }
    }

}
