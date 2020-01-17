<?php
declare(strict_types=1);

namespace BNLambert\Phalcon\Mailer;

use BNLambert\Momo\Interfaces\MailerInterface;
use BNLambert\Phalcon\Mailer\helpers\Message;
use GuzzleHttp\Client;
use BNLambert\Momo\Helpers\Config;


/**
*  A sample class
*
*  Use this section to define what this class is doing, the PHPDocumentator will use this
*  to automatically generate an API documentation using this information.
*
*  @author yourname
*/
class Mailer {

    protected $config;
    protected $message;


    public function __construct($params)
    {
        $this->config = new Config($params);
        $this->message = new Message();
    }

    public function send()
    {
        try {
            $mailer = new Swift_Mailer($this->config->getTransport());
            $mailer->send($this->message->getMsg());
            return true;
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

}