<?php

use App\Characteristic;
use App\Charsheet;
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
            // savage
            [
                'name'  => 'agility',
                'items' => [
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
                'type'  => Charsheet::TYPE_SAVAGE_WORLD,
            ],
            [
                'name'  => 'intelligence',
                'items' => [
                    'gambles',
                    'attention',
                    'survival',
                    'espial',
                    'healing',
                    'provocation',
                    'investigation',
                    'street sense',
                ],
                'type'  => Charsheet::TYPE_SAVAGE_WORLD,
            ],
            [
                'name'  => 'character',
                'items' => [
                    'intimidation',
                    'conviction',
                ],
                'type'  => Charsheet::TYPE_SAVAGE_WORLD,
            ],
            [
                'name'  => 'force',
                'items' => [
                    'climbing',
                ],
                'type'  => Charsheet::TYPE_SAVAGE_WORLD,
            ],
            [
                'name'  => 'stamina',
                'items' => [],
                'type'  => Charsheet::TYPE_SAVAGE_WORLD,
            ],

            // cyberpunk
            [
                'name' => 'force',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'agility',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'charisma',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'manipulation',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'appearance',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'perception',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'intellect',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'intelligence',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'athletics',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'attentiveness',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'intimidation',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'street_knowledge',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'leadership',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'hand_fight',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'evasion',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'trick',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'expression',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'empathy',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'safety',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'driving',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'survival',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'execution',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'knowledge_animal',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'crafts',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'stealth',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'shooting',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'fencing',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'etiquette',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'academic',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'laws',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'computers',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'linguistics',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'medicine',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'scientific',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'cybernetics',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'politics',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'investigation',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'finance',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'extensions',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'mods',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'compassion',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'control',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'boldness',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'humanity',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'willpower',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'willpowerGeneral',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
            [
                'name' => 'bioBattery',
                'type' => Charsheet::TYPE_CYBERPUNK,
            ],
        ];

        foreach ($data as $parentData) {
            $parent = Characteristic::updateOrCreate([
                'name'           => __('app.' . $parentData['name']),
                'is_default'     => true,
                'charsheet_type' => $parentData['type'],
            ]);

            $items = $parentData['items'] ?? [];

            foreach ($items as $item) {
                Characteristic::updateOrCreate([
                    'name'           => __('app.' . $item),
                    'parent_id'      => $parent->id,
                    'is_default'     => true,
                    'charsheet_type' => $parentData['type'],
                ]);
            }
        }
    }
}
