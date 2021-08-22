<?php

namespace App\Console\Commands;

use App\Characteristic;
use Cviebrock\EloquentSluggable\Services\SlugService;
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
        $characteristics = Characteristic::whereSlug(null)
            ->get();

        foreach ($characteristics as $characteristic) {
            $characteristic->slug = SlugService::createSlug(Characteristic::class, 'slug', $characteristic->name);
            $characteristic->save();
        }

        $this->info('Success');

        return 0;
    }
}
