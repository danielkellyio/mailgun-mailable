<?php
namespace DanielKellyIO\MailgunMailable;

trait MailgunMailable{
	protected function tags($tags=[]){
		$tags = is_array($tags) ? $tags : [$tags];
		$this->withSwiftMessage(function ($message) use ($tags) {
			$headers = $message->getHeaders();
			foreach ($tags as $tag){
				if(!is_string($tag)){
					throw new MailgunHelpersException('Mail gun tags must be strings');
				}
				$headers->addTextHeader('X-Mailgun-Tag', (string) $tag);
			}
		});
	}

	protected function variables(array $variables = []) : void{
		foreach($variables as $key=> $value){
			if(!is_string($key)){
				throw new MailgunHelpersException('The MailgunHelpers variables() method requires an ASSOCIATIVE array');
			}
		}
		$this->withSwiftMessage(function ($message) use ($variables) {
			$headers = $message->getHeaders();
			$headers->addTextHeader('X-Mailgun-Variables', json_encode($variables));
		});
	}
}
