# Mailgun Mailable
A trait to make your laravel mailables smarter about working with mailgun. 

*Note* - not used to send your mail with Mailgun. Use with mail that's already being sent with Mailgun using Laravel's out of the box Mailgun driver. Provides some helper methods to deal with unique Mailgun features like variables and tags.

### Installation
```
composer install danielkellyio/mailgun-mailable
``` 

### Add tags to an email
[What are mailgun tags?](https://www.mailgun.com/blog/tags-explained-gaining-useful-insights-from-email-segmentation/)
```php
<?php
use DanielKellyIO\MailgunMailable\MailgunMailable;
// ...

class YourEmail extends Mailable {
	use MailgunMailable;

	public function build() {
		$this->tags(['tag-1', 'tag-2']);
		// ...
	}
}
```

### Add variables to an email
(Can be used to manage email templates within the Mailgun interface. [More info](https://www.mailgun.com/blog/getting-started-with-our-email-templates-api/))
```php
<?php
use DanielKellyIO\MailgunMailable\MailgunMailable;
// ...

class YourEmail extends Mailable {
	use MailgunMailable;

	public function build() {
        $this->variables([
            'greeting' => 'Hello',
            'name' => 'Daniel'
        ]);
		// ...
	}
}
```
