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

namespace MikrotikAPI\Talker;

use MikrotikAPI\Entity\Auth;
use MikrotikAPI\Core\Connector;


class Talker {

    private $sender;
    private $reciever;
    private $auth;
    private $connector;



    public function __construct(Auth $auth) {
        $this->auth = $auth;
        $this->connector = new Connector($auth->getHost(), $auth->getPort(), $auth->getUsername(), $auth->getPassword());
        $this->connector->connect();
        $this->sender = new TalkerSender($this->connector);
        $this->reciever = new TalkerReciever($this->connector);
    }


    public function isLogin() {
    }


    public function isConnected() {
    }


    public function isDebug() {
        return $this->auth->getDebug();
    }


    public function setDebug($boolean) {
        $this->auth->setDebug($boolean);
        $this->sender->setDebug($boolean);
        $this->reciever->setDebug($boolean);
    }

    public function isTrap() {
        return $this->reciever->isTrap();
    }

    public function isDone() {
        return $this->reciever->isDone();
    }

    public function isData() {
        return $this->reciever->isData();
    }

    public function send($sentence) {
        $this->sender->send($sentence);
        $this->reciever->doRecieving();
    }


    public function getResult() {
        return $this->reciever->getResult();
    }

}
