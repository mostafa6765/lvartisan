<?php

namespace monirz\lvartisan\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ViewCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:view {views?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a view.';

    /**
     * Create a new command instance.
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
        $input = $this->argument('views');
        /**
         * Check if any slash in input.
         */
        $file = config('view.paths.0').'/'.$input.'.blade.php';
        $dirName = dirname($file);
        if (!is_dir($dirName)) {
            mkdir($dirName, 0755, true);
        }

        if (!file_exists($file)) {
            fopen($file, 'w');
            $this->comment('<info>Created view : '.$input.'.blade.php</info>');
        } else {
            $this->comment('<error>'.$input.'.blade.php is already exists</error>');
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
            ['views', InputArgument::OPTIONAL, 'Name of the view'],
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
