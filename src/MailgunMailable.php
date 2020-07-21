<?php
namespace DanielKellyIO\MailgunMailable;

trait MailgunMailable{
	protected function tags($tags){
		$this->withSwiftMessage(function ($message) use ($tags) {
		    MailgunHelpers::tags($message, $tags);
		});
	}

	protected function variables(array $variables) : void{
		$this->withSwiftMessage(function ($message) use ($variables) {
            MailgunHelpers::variables($message, $variables);
		});
	}
}
