<?php

namespace Tarifiner\Console\Commands;

use Tarifiner\Library\TarifinerHelper;
use Tarifiner\Models\Tarifiner;
use Tarifiner\Models\TarifinerSetting;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ExampleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tarifiner:example';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Заготовка команды tarifiner';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {

        $this->info("tarifiner - Команда выполнена");
    }
}
