<?php

namespace App\Console\Commands\ECommerce;

use Workerman\Worker;
use Workerman\Lib\Timer;
use Illuminate\Console\Command;

define('HEARTBEAT_TIME', 1);

class e3man extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wk {action}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start a E3 server.';

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
    public function handle()
    {
        global $argv;
        $arg = $this->argument('action');
        $argv[1] = $argv[2];
        $argv[2] = isset($argv[3]) ? "-{$argv[3]}" : '';
        switch ($arg) {
            case 'start':
                $this->start();
                break;
            case 'stop':
                break;
            case 'restart':
                break;
            case 'reload':
                break;
            case 'status':
                break;
            case 'connections':
                break;
        }
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    private function start()
    {
        $task = new Worker();
        $task->onWorkerStart = function ($task) {
            Timer::add(HEARTBEAT_TIME, function () {
                echo "Timer run " . date("h:i:sa") . "\n";
            });
        };
        Worker::runAll();
    }
}
