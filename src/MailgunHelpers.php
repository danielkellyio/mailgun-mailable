<?php
namespace DanielKellyIO\MailgunMailable;

class MailgunHelpers{
    public static function tags($message, $tags){
        $tags = is_array($tags) ? $tags : [$tags];
        $headers = $message->getHeaders();
        foreach ($tags as $tag){
            if(!is_string($tag)){
                throw new MailgunMailableException('Mail gun tags must be strings');
            }
            $headers->addTextHeader('X-Mailgun-Tag', (string) $tag);
        }
    }

    public static function variables($message, $variables){
        foreach($variables as $key=> $value){
            if(!is_string($key)){
                throw new MailgunMailableException('The MailgunMailable variables() method requires an ASSOCIATIVE array');
            }
        }
        $headers = $message->getHeaders();
        $headers->addTextHeader('X-Mailgun-Variables', json_encode($variables));
    }
}
