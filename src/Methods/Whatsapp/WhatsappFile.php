<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Zafranudin
 * Date: 2/15/2019
 * Time: 4:25 PM
 */

namespace App\Libraries\LaravelWhatsappApi\Methods\Whatsapp;


use App\Libraries\LaravelWhatsappApi\Methods\Whatsapp;

class WhatsappFile extends Whatsapp
{
    public function file($file, $fileName, $caption = '')
    {
        $this->file = $fileName;
        $this->body = $file;
        $this->caption = $caption;

        $this->intention = 'sendFile';
        return parent::callback();
    }

}