<?php namespace App\Http\Controllers;

use Request, Mail, Validator, Redirect;

class PageController extends Controller {

	public function home()
	{
		return view('pages.home');
	}

	public function contact()
	{
		Mail::send('emails.contact', [], function($message) {
			$message->to('client-email@thewebsite.com',
						 'another-client-email@thewebsite.com')
					->subject('Contact Form Submission');
		});
	}
}
