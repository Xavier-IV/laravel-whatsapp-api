<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Zafranudin
 * Date: 2/15/2019
 * Time: 10:21 AM
 */

namespace XavierIV\LaravelWhatsappApi;


interface Notification
{

    public function to($recipient);

    public function send();

}