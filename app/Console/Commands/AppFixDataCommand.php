<?php

namespace App\Console\Commands;

use App\Characteristic;
use App\Charsheet;
use Illuminate\Console\Command;

class AppFixDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fix-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Временная команда для фиксов';

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
     * @return int
     */
    public function handle(): int
    {
        $charsheets      = Charsheet::with('characteristics')->get();
        $characteristics = Characteristic::whereCharsheetType(Charsheet::TYPE_SAVAGE_WORLD)
            ->whereIsDefault(true)
            ->get();

        foreach ($charsheets as $charsheet) {
            if (!$charsheet->type) {
                $charsheet->type = Charsheet::TYPE_SAVAGE_WORLD;
                $charsheet->save();
            }

            $characteristicValues = [];

            foreach ($characteristics as $characteristic) {
                if (!$charsheet->characteristics()->find($characteristic->id)) {
                    $characteristicValues[$characteristic->id] = ['value' => 0];
                }
            }

            if ($characteristicValues) {
                $charsheet->characteristics()->syncWithoutDetaching($characteristicValues);
            }
        }

        $characteristics = Characteristic::whereCharsheetType(null)->whereIsDefault(true)->get();

        foreach ($characteristics as $characteristic) {
            $characteristic->charsheet_type = Charsheet::TYPE_SAVAGE_WORLD;
            $characteristic->save();
        }

        $this->info('Success');

        return 0;
    }
}
