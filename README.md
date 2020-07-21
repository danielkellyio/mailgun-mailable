# Mailgun Mailable
A trait to make your laravel mailables smarter about working with mailgun. 

*Note* - not used to send your mail with Mailgun. Use with mail that's already being sent with Mailgun using Laravel's out of the box Mailgun driver. Provides some helper methods to deal with unique Mailgun features like variables and tags.

### Installation
```
composer require danielkellyio/mailgun-mailable
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

### No mailable class? 
Using send with a callback to compose message? Add tags and variables directly to messages like so:
```php
use DanielKellyIO\MailgunMailable\MailgunHelpers;

Mail::send( 'your-email-template', [], function ( $m ) {
    $m->to( 'test@test.com' )->subject( 'Test Email' );
    MailgunHelpers::tags($m, ['tag-1', 'tag-2']);
    MailgunHelpers::variables($m, [
        'greeting' => 'Hello',
        'name' => 'Daniel'
    ]);
});
```
