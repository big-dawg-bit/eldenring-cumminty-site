<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Boss;

class BossSeeder extends Seeder
{
    public function run(): void
    {
        $bosses = [
            [
                'name' => 'Margit, The Fell Omen',
                'title' => 'The First Wall',
                'description' => 'Margit the Fell Omen is a Great Enemy Boss in Elden Ring. He is found in Stormveil Castle, blocking the path to Godrick the Grafted. This is often the first major challenge for new Tarnished, testing their combat skills and patience.',
                'location' => 'Stormveil Castle',
                'difficulty' => 3,
                'drops' => 'Talisman Pouch',
                'health' => 4174,
                'order' => 1,
                'image' => null,
            ],
            [
                'name' => 'Godrick the Grafted',
                'title' => 'The Golden',
                'description' => 'Godrick the Grafted is a Great Enemy and Shardbearer in Elden Ring. He is the ruler of Stormveil Castle and possesses one of the Great Runes. Godrick is known for grafting the limbs of his enemies onto his own body to gain their strength.',
                'location' => 'Stormveil Castle',
                'difficulty' => 3,
                'drops' => 'Godrick\'s Great Rune, Remembrance of the Grafted',
                'health' => 6080,
                'order' => 2,
                'image' => null,
            ],
            [
                'name' => 'Rennala, Queen of the Full Moon',
                'title' => 'The Reborn',
                'description' => 'Rennala is a Great Enemy and Shardbearer found at the Academy of Raya Lucaria. Once a powerful sorceress and head of the Carian Royal Family, she now spends her time obsessing over the amber egg gifted to her by Radagon.',
                'location' => 'Academy of Raya Lucaria',
                'difficulty' => 2,
                'drops' => 'Great Rune of the Unborn, Remembrance of the Full Moon Queen',
                'health' => 3600,
                'order' => 3,
                'image' => null,
            ],
            [
                'name' => 'Starscourge Radahn',
                'title' => 'The Conqueror of the Stars',
                'description' => 'Starscourge Radahn is a Great Enemy and Shardbearer in Elden Ring. Once a mighty demigod who learned gravity magic to ride his beloved horse Leonard, Radahn has been consumed by Scarlet Rot and has lost his mind, though he remains a formidable warrior.',
                'location' => 'Redmane Castle, Caelid',
                'difficulty' => 5,
                'drops' => 'Remembrance of the Starscourge, Radahn\'s Great Rune',
                'health' => 9572,
                'order' => 4,
                'image' => null,
            ],
            [
                'name' => 'Malenia, Blade of Miquella',
                'title' => 'Goddess of Rot',
                'description' => 'Malenia, Blade of Miquella is considered one of the hardest bosses in Elden Ring. She is an optional boss, but is required to get a certain ending. Malenia has never known defeat and can heal herself with each strike.',
                'location' => 'Elphael, Brace of the Haligtree',
                'difficulty' => 5,
                'drops' => 'Remembrance of the Rot Goddess, Malenia\'s Great Rune',
                'health' => 33251,
                'order' => 5,
                'image' => null,
            ],
            [
                'name' => 'Mohg, Lord of Blood',
                'title' => 'The Blood Lord',
                'description' => 'Mohg, Lord of Blood is a Great Enemy in Elden Ring. He is an Omen who wished to become a full god and consort to Miquella. His attacks inflict blood loss and can be very dangerous for unprepared players.',
                'location' => 'Mohgwyn Palace',
                'difficulty' => 4,
                'drops' => 'Remembrance of the Blood Lord, Mohg\'s Great Rune',
                'health' => 18389,
                'order' => 6,
                'image' => null,
            ],
        ];

        foreach ($bosses as $boss) {
            Boss::create($boss);
        }
    }
}
