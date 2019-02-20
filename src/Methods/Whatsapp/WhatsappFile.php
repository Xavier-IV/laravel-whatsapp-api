<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Zafranudin
 * Date: 2/15/2019
 * Time: 4:25 PM
 */

namespace XavierIV\LaravelWhatsappApi\Whatsapp;


use XavierIV\LaravelWhatsappApi\Whatsapp;

class WhatsappFile extends Whatsapp
{
    public function file($file, $fileName)
    {
        $this->file = $fileName;
        $this->body = $file;

        $this->intention = 'sendFile';
        return $this;
    }

    public function caption($caption = '')
    {
        $this->caption = $caption;
        return $this;
    }

}