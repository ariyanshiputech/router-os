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

namespace MikrotikAPI\Commands\PPP;

use MikrotikAPI\Util\SentenceUtil,
    MikrotikAPI\Talker\Talker;


class Active {

    private $talker;

    function __construct(Talker $talker) {
        $this->talker = $talker;
    }

    
    public function getAll() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ppp/active/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        return $i < $rs->size() ? $rs->getResultArray() : "No PPP Active To Set, Please Your Add PPP Active";
    }

    public function detail($name){
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ppp/active/print");
        $sentence->where('name','=',$name);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        return $i < $rs->size() ? $rs->getResultArray() : "No PPP Active with name $name found";
    }
    public function deleteById($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ppp/active/remove");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }
    public function deleteByName($name) {
        $detail = $this->detail($name);
        $id =is_array($detail)?$detail[0]['.id']:null;
        return $id ? $this->deleteById($id) : "No PPP Active with name $name found";

    }

}
