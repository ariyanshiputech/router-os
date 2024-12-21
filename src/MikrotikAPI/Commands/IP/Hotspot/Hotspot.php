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

use MikrotikAPI\Talker\Talker;
use MikrotikAPI\Commands\IP\Hotspot\Server,
    MikrotikAPI\Commands\IP\Hotspot\ServerProfiles,
    MikrotikAPI\Commands\IP\Hotspot\Users,
    MikrotikAPI\Commands\IP\Hotspot\UserProfile,
    MikrotikAPI\Commands\IP\Hotspot\Hosts,
    MikrotikAPI\Commands\IP\Hotspot\Active,
    MikrotikAPI\Commands\IP\Hotspot\IPBindings,
    MikrotikAPI\Commands\IP\Hotspot\Cookie;


class Hotspot {


    private $talker;

    function __construct(Talker $talker) {
        $this->talker = $talker;
    }


    public function server() {
        return new Server($this->talker);
    }


    public function serverProfiles() {
        return new ServerProfiles($this->talker);
    }


    public function users() {
        return new Users($this->talker);
    }


    public function userProfiles() {
        return new UserProfile($this->talker);
    }


    public function active() {
        return new Active($this->talker);
    }


    public function hosts() {
        return new Hosts($this->talker);
    }


    public function IPBinding() {
        return new IPBindings($this->talker);
    }


    public function cookie() {
        return new Cookie($this->talker);
    }

}
