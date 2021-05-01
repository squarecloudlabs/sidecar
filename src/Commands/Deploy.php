<?php
/**
 * @author Aaron Francis <aaron@hammerstone.dev>
 */

namespace Hammerstone\Sidecar\Commands;

use Hammerstone\Sidecar\Deployment;
use Hammerstone\Sidecar\Sidecar;
use Illuminate\Console\Command;

class Deploy extends Command
{
    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'sidecar:deploy {--do-not-activate}';

    /**
     * The console command description.
     * @var string
     */
    protected $description = 'Deploy Sidecar functions.';

    /**
     * @throws Exception
     */
    public function handle()
    {
        Sidecar::addLogger(function ($message) {
            $this->info($message);
        });

        $activate = !$this->option('do-not-activate');

        Deployment::make()->deploy($activate);
    }

}
