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


class DNS{

    private $talker;
    
    function __construct(Talker $talker){
        $this->talker = $talker;
    }
    

    public function set($servers){
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/dns/set");
        $sentence->setAttribute("servers", $servers);
        $this->talker->send($sentence);
        return "Sucsess";
    }
    

    public function getAll(){
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/dns/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()){
            return $rs->getResultArray();
        }else{
            return "No Ip DNS To Set, Please Your Add Ip DNS";
        }
    }
     

    public function addStatic($param){
       $sentence = new SentenceUtil();
       $sentence->addCommand("/ip/dns/static/add");
       foreach ($param as $name => $value){
               $sentence->setAttribute($name, $value);
       }       
       $this->talker->send($sentence);
       return "Sucsess";
    }

    public function getAllStatic(){
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/dns/static/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()){
            return $rs->getResultArray();
        }else{
            return "No Ip Static DNS To Set, Please Your Add Ip Static DNS";
        }
    }
    

     public function detailStatic($id){
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/dns/static/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0 ;
        if ($i < $rs->size()){
            return $rs->getResultArray();
        }  else {
            return "No Ip Static DNS With This Id = ".$id;
        }
    }
    

    public function setStatic($param, $id){
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/dns/static/set");
        foreach ($param as $name => $value){
                $sentence->setAttribute($name, $value);
         }
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }


    public function getAllCache(){
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/dns/cache/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()){
            return $rs->getResultArray();
        }else{
            return "No Ip DNS Cache To Set, Please Your Add Ip DNS Cache";
        }
    }
    

     public function detailCache($id){
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/dns/cache/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0 ;
        if ($i < $rs->size()){
            return $rs->getResultArray();
        }  else {
            return "No Ip DNS Cache With This Id = ".$id;
        }
    }
    

    public function getAllCacheAll(){
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/dns/cache/all/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()){
            return $rs->getResultArray();
        }else{
            return "No Ip DNS Cache All To Set, Please Your Add Ip DNS Cache All";
        }
    }
    

     public function detailCacheAll($id){
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/dns/cache/all/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0 ;
        if ($i < $rs->size()){
            return $rs->getResultArray();
        }  else {
            return "No Ip DNS Cache All With This Id = ".$id;
        }
    }
}
