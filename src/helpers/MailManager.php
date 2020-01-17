<?php
/**
 * Created by IntelliJ IDEA.
 * User: HP
 * Date: 12/22/2019
 * Time: 9:58 PM
 */

namespace BNLambert\Phalcon\Mailer\helpers;


class MailManager
{


    protected $config;
    protected $message;


    public function __construct()
    {
        // $this->config = new Config($params);
        $this->message = new Message();
    }



}