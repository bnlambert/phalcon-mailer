<?php
namespace BNLambert\Phalcon\Mailer\Interfaces;
/**
 * Message composer
 */

interface MessageInterface {
    public function subject($subject);
    public function from(array $from);
    public function replyTo(array $replyTo);
    public function attach($path);
    public function cc(array $cc);
    public function bcc(array $bcc);
    public function body($params, $templatePath = null);
    public function to(array $to);
}