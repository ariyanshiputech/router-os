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

namespace MikrotikAPI\Core;

use MikrotikAPI\Core\StreamReciever,
    MikrotikAPI\Core\StreamSender,
    MikrotikAPI\Util\Util;


class Connector {

    private $socket;
    private $sender;
    private $reciever;
    private $host;
    private $port;
    private $username;
    private $password;
    private $connected = FALSE;
    private $login = FALSE;

    public function __construct($host, $port, $username, $password) {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
        $this->initStream();
    }

    public function isConnected() {
        return $this->connected;
    }

    public function isLogin() {
        return $this->login;
    }

    private function initStream() {
        $this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        $this->sender = new StreamSender($this->socket);
        $this->reciever = new StreamReciever($this->socket);
    }

    public function sendStream($command) {
        return $this->sender->send($command);
    }

    public function recieveStream() {
        return $this->reciever->reciever();
    }

    private function challanger($username, $password, $challange) {
        $chal = md5(chr(0) . $this->password . pack('H*', $challange));
        $login = "/login\n=name=" . $this->username . "\n=response=00" . $chal;
        return $login;
    }

    public function connect() {
        if (socket_connect($this->socket, $this->host, $this->port)) { 
			$login = "/login\n=name=" . $this->username . "\n=password=" . $this->password;
			$this->sendStream($login);
            $res = $this->recieveStream();
			 if (Util::contains($res, "!done") && !Util::contains($res, "!trap")) {
                        $this->login = TRUE;
						 $this->connected = TRUE;
                    }else{
						 $this->connected = FALSE;
					}
    }

}

}