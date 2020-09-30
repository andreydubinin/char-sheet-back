<?php

use App\Characteristic;
use Illuminate\Database\Seeder;

/**
 * Class CharacteristicSeeder
 */
class CharacteristicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'agility'      => [
                'horsebackRiding',
                'breaking',
                'driving',
                'fight',
                'concealment',
                'throwing',
                'flying',
                'swimming',
                'shooting',
                'navigation',
            ],
            'intelligence' => [
                'gambles',
                'attention',
                'survival',
                'espial',
                'healing',
                'provocation',
                'investigation',
                'street sense',
            ],
            'character'    => [
                'intimidation',
                'conviction',
            ],
            'force'        => [
                'climbing',
            ],
            'stamina'      => [],
        ];

        foreach ($data as $parentName => $items) {
            $parent = Characteristic::create([
                'name'       => __('app.' . $parentName),
                'is_default' => true,
            ]);

            foreach ($items as $item) {
                Characteristic::create([
                    'name'       => __('app.' . $item),
                    'parent_id'  => $parent->id,
                    'is_default' => true,
                ]);
            }
        }
    }
}
