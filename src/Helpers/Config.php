<?php
/**
 * Created by IntelliJ IDEA.
 * User: HP
 * Date: 12/22/2019
 * Time: 9:58 PM
 */

namespace BNLambert\Phalcon\Mailer\Helpers;

use Phalcon\Di\Injectable;

class Config extends Injectable
{


    protected $driver;
    protected $host;
    protected $port;
    protected $from;
    protected $encryption;
    protected $username;
    protected $password;
    protected $sendmail;

    protected $transport;


    public function __construct()
    {
        $params = $this->config->email ?? [];

        $this->driver = $params['driver'] ?? 'smtp';
        $this->host = $params['host'] ?? 'localhost';
        $this->port = $params['port'] ?? 25;
        $this->from = $params['from'] ?? ['address' => 'Test@test.test', 'name' => ''];
        $this->encryption = $params['encryption'] ?? 'tls';
        $this->username = $params['username'] ?? null;
        $this->password = $params['password'] ?? null;
        $this->sendmail = $params['sendmail'] ?? '/usr/sbin/sendmail -bs';
    }


    public function getTransport()
    {
        // Create the Transport
        if($this->driver == 'sendmail') {

            $this->transport = new \Swift_SendmailTransport('/usr/sbin/sendmail -bs');
        }
        else {

            $this->transport = (new \Swift_SmtpTransport($this->host, $this->port))
                ->setUsername($this->username)
                ->setPassword($this->password);
        }


        return $this->transport;

    }

}