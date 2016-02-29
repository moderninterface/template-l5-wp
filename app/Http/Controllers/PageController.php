<?php namespace App\Http\Controllers;

use Mail;
use Validator;
use Illuminate\Http\Request;

class PageController extends Controller {

	public function getHome()
	{
		return view('pages.home');
	}

	public function getAbout()
	{
		return view('pages.about');
	}

	public function getContact()
	{
		return view('pages.contact');
	}

	public function getServices()
	{
		return view('pages.services');
	}

	public function postContact(Request $request)
	{
		$v = Validator::make($request->all(), [
			'email'  => 'required|email',
			'theName' => 'required',
			'phone' => 'required'
		]);

		if ($v->fails()) {
			$errors = '';
			foreach ($v->messages()->all() as $message) {
				$errors .= '<p class="alert-box radius alert">' . $message .  '</p>';
			}
			return $errors;
		}

		if (strlen($request->age)) {
			return '<p class="alert-box radius alert">Sorry, your message could not be sent. We think you\'re a bot!</p>';
		}

		Mail::send('emails.contact', compact('request'), function($message) use ($request) {
			$message->to('client-email@thewebsite.com')
			->replyTo($request->email, $request->theName)
			->bcc('alan@moderninterface.com')
			->bcc('michael@moderninterface.com')
			->to('another-client-email@thewebsite.com')
			->subject('Contact Form Submission');
		});

		//todo: set to return 'fail' if mail does not send....

		//Campaign Monitor
		$monitor = new CS_REST_Subscribers(env('CM_LIST_ID_CONTACT'), [
			'api_key' => env('CM_API_KEY')
		]);

		$result = $monitor->add(array(
			'EmailAddress' => $request->email
		));

		if ( ! $result->was_successful()) {
			return '<p class="alert-box radius alert">' . $result->response->Message . '</p>';
		}

		return 'success';
	}

	public function postNewsletter(Request $request)
	{
		$v = Validator::make($request->all(), [
			'email'  => 'required|email'
		]);

		if ($v->fails()) {
			$errors = '';
			foreach ($v->messages()->all() as $message) {
				$errors .= '<p class="alert-box radius alert">' . $message .  '</p>';
			}
			return $errors;
		}

		if (strlen($request->age)) {
			return '<p class="alert-box radius alert">Sorry, your message could not be sent. We think you\'re a bot!</p>';
		}

		Mail::send('emails.newsletter', compact('request'), function($message) use ($request) {
			$message->from('client-email@thewebsite.com', 'Website Contact Submission')
				->replyTo($request->email, $request->name)
				->to('client-email@thewebsite.com')
				->bcc('alan@moderninterface.com')
				->bcc('michael@moderninterface.com')
				->subject('Newsletter signup!');
		});

		//todo: set to return 'fail' if mail does not send....

		//Campaign Monitor
		$monitor = new CS_REST_Subscribers(env('CM_LIST_ID_NEWSLETTER'), [
			'api_key' => env('CM_API_KEY')
		]);

		$result = $monitor->add(array(
			'EmailAddress' => $request->email
		));

		if ( ! $result->was_successful()) {
			return '<p class="alert-box radius alert">' . $result->response->Message . '</p>';
		}

		return 'success';
	}
}
