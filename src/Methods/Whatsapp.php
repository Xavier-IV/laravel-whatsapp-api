<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Zafranudin
 * Date: 2/15/2019
 * Time: 11:32 AM
 */

namespace XavierIV\LaravelWhatsappApi;

class Whatsapp implements Notification
{
    protected $recipient;
    protected $recipients;
    protected $fields;
    protected $endpoint;
    protected $intention;
    protected $body;
    protected $caption;

    protected $file;

    public function to($recipient)
    {
        $this->recipient = $recipient;
        return $this;
    }

    public function toMany($recipients)
    {
        $this->recipients = $recipients;
    }

    public function send()
    {
        if($this->recipient){
            $this->sendSingle();
        }

        if ($this->recipients) {
            foreach($this->recipients as $recipient)
            {
                $this->sendSingle($recipient);
            }
        }
    }

    private function sendSingle($recipient = '')
    {
        $this->fields = [
            'body' => $this->body,
            'filename' => $this->file,
            'phone' => $recipient ?? $this->recipient,
            'caption' => $this->caption,
        ];

        $this->fields = json_encode($this->fields);
        $this->endpoint =  env('CHAT_API_URL') . $this->intention . '?token=' . env('CHAT_API_TOKEN');

        if($this->endpoint && $this->fields) {
            $chatch = curl_init();
            curl_setopt($chatch, CURLOPT_URL, $this->endpoint);
            curl_setopt($chatch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json; charset=utf-8',
            ]);
            curl_setopt($chatch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($chatch, CURLOPT_HEADER, FALSE);
            curl_setopt($chatch, CURLOPT_POST, TRUE);
            curl_setopt($chatch, CURLOPT_POSTFIELDS, $this->fields);
            curl_setopt($chatch, CURLOPT_SSL_VERIFYPEER, FALSE);

            $response = curl_exec($chatch);
            curl_close($chatch);
        }
    }


}