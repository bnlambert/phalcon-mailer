<?php
/**
 * Created by IntelliJ IDEA.
 * User: HP
 * Date: 12/22/2019
 * Time: 9:58 PM
 */

namespace BNLambert\Phalcon\Mailer\Helpers;


use BNLambert\Phalcon\Mailer\Interfaces\MessageInterface;

class Message implements MessageInterface
{

    protected $msg;

    public function __construct()
    {
        $this->msg = (new \Swift_Message());

        // ->setBody('Here is the message itself')
    ;

    }

    public function subject($subject)
    {
        $this->msg->setSubject($subject);
        return $this;
    }

    public function from(array $from)
    {
        $this->msg->setFrom($from);
        return $this;
    }

    public function replyTo(array $replyTo)
    {
        $this->msg->setReplyTo($replyTo);
        return $this;
    }

    public function attach($path)
    {
        $this->msg->attach(\Swift_Attachment::fromPath($path));
        return $this;
    }

    public function cc(array $cc)
    {
        $this->msg->setCc($cc);
        return $this;
    }

    public function bcc(array $bcc)
    {
        $this->msg->setBcc($bcc);
        return $this;
    }

    public function body($params, $temp = null)
    {
        if(!$temp) {
            $this->msg->setBody($params);
        }
        else {
            ob_start();
            include $temp;
            $content = ob_get_contents();
            ob_end_clean();
            $this->msg->setBody($content, 'text/html');
            return $this;
        }
    }

    public function to(array $to)
    {
        $this->msg->setTo($to);
        return $this;
    }

    public function getMsg()
    {
        return $this->msg;
    }


}