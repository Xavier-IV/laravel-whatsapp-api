<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Zafranudin
 * Date: 2/15/2019
 * Time: 4:23 PM
 */

namespace App\Libraries\LaravelWhatsappApi\Methods\Whatsapp;

use App\Libraries\LaravelWhatsappApi\Methods\Whatsapp;

class WhatsappMessage extends Whatsapp
{

    public function message($message)
    {
        $this->body = $message;
        $this->intention = 'sendMessage';
        return $this;
    }

}