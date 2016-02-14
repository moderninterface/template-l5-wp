<?php namespace App\Console\Commands;

use Illuminate\Console\Command;

class ViewFooter extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'view:footer';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Print out the "footer" view.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
        echo view('footer');
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [];
	}

}
