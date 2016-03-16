<?php namespace monirz\lvartisan\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ViewCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'make:view {user?}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Creates a view ';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */

	protected $drip;
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
        $input =  $this->argument('user');
		/**
		 * Check if any slash in input
		 */
		if (strpos($input, '/')){
			$arr = explode('/', $input);

			$dir = 'resources/views/' . $arr[0];
            // check if the directory doesn't exist then create the directory
			if (!file_exists($dir)) {
				mkdir('resources/views/'. $arr[0]);
				$this->comment("$arr[0] directory created");
			}

            $file = 'resources/views/'. $arr[0] .'/'. $arr[1] . '.blade.php';
			if(! file_exists($file)){
				fopen('resources/views/'. $arr[0] .'/'. $arr[1] . '.blade.php', 'w');
				$this->comment("File created $arr[1].blade.php ");

			} else {
				$this->error(" $arr[1].blade.php  File already exists in views/$arr[0]");
			}

		}  else {

			$file = 'resources/views/'. $input. '.blade.php';
			if (! file_exists($file)) {
				fopen('resources/views/' . $input . '.blade.php', 'w');
				$this->comment(" view created");
				$this->comment("$file");
			}else {
				$this->error('File already exists');
				print "Error: $file File already exists\n";
			}
		}

	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
			['user', InputArgument::OPTIONAL, 'An example argument.'],
		];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [
			['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
		];
	}

}
