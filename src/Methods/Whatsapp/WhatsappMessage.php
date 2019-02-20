<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Zafranudin
 * Date: 2/15/2019
 * Time: 4:23 PM
 */

namespace XavierIV\LaravelWhatsappApi\Whatsapp;

use XavierIV\LaravelWhatsappApi\Whatsapp;

class WhatsappMessage extends Whatsapp
{

    public function message($message)
    {
        $this->body = $message;
        $this->intention = 'sendMessage';
        return $this;
    }

}