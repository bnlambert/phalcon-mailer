<?php
namespace BNLambert\Momo\Interfaces;
/**
 * Created by IntelliJ IDEA.
 * User: HP
 * Date: 12/22/2019
 * Time: 9:04 PM
 */

interface MailerInterface {
    public function checkOut($tel, int $amount);
}