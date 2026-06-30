<?php

namespace App\Console\Commands;

use app\Domain\Tender\Actions\ClaimNextTenderAction;
use Illuminate\Console\Command;

class ProcessTenders extends Command
{
    protected $signature = 'tenders:process';
    protected $description = 'Continuously claims and processes tenders in a loop';

    public function __construct(
        private readonly ClaimNextTenderAction $claimNextTenderAction,
    ) {
        parent::__construct();
    }

    public function handle(): void
    {
        $sleepBase = (int) config('monitorador.tender_loop_sleep');
        $sleepMax  = (int) config('monitorador.tender_loop_sleep_max');
        $sleep     = $sleepBase;

        $this->info("Starting tender processor (sleep: {$sleepBase}s, max: {$sleepMax}s)");

        while (true) {
            $tender = $this->claimNextTenderAction->execute();

            if ($tender !== null) {
                $sleep = $sleepBase;

                echo 'tender found' . PHP_EOL;
                var_dump($tender->toArray());
            } else {
                $sleep = min($sleep * 2, $sleepMax);
            }

            echo "sleeping {$sleep}s..." . PHP_EOL;

            sleep($sleep);
        }
    }
}
