<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\User;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        // Get the admin user
        $admin = User::where('email', 'admin@ehb.be')->first();

        $news = [
            [
                'user_id' => $admin->id,
                'title' => 'Shadow of the Erdtree DLC Announced',
                'content' => 'FromSoftware has officially announced the first major DLC expansion for Elden Ring, titled "Shadow of the Erdtree". The expansion promises new areas to explore, challenging bosses to defeat, and a continuation of the Elden Ring story. Players can expect new weapons, spells, and armor sets to discover throughout their journey in the Land of Shadow.',
                'publication_date' => Carbon::now()->subDays(5),
                'image' => null,
            ],
            [
                'user_id' => $admin->id,
                'title' => 'Elden Ring Wins Game of the Year',
                'content' => 'Elden Ring has been awarded Game of the Year at The Game Awards 2022! The game swept multiple categories including Best Role Playing Game and Best Art Direction. Director Hidetaka Miyazaki thanked fans for their support and hinted at exciting future content for the game.',
                'publication_date' => Carbon::now()->subDays(30),
                'image' => null,
            ],
            [
                'user_id' => $admin->id,
                'title' => 'New Update Adds Ray Tracing Support',
                'content' => 'A new patch has been released that adds ray tracing support for next-gen consoles and PC. The update also includes performance improvements, bug fixes, and balance adjustments for several weapons and spells. Players on PlayStation 5 and Xbox Series X can now experience enhanced lighting and reflections.',
                'publication_date' => Carbon::now()->subDays(15),
                'image' => null,
            ],
            [
                'user_id' => $admin->id,
                'title' => 'Community Reaches 20 Million Players',
                'content' => 'Elden Ring has officially surpassed 20 million players worldwide! FromSoftware released a statement thanking the community for their incredible support and shared statistics about the most defeated bosses, popular build types, and player death counts. The Tarnished continue to rise!',
                'publication_date' => Carbon::now()->subDays(45),
                'image' => null,
            ],
            [
                'user_id' => $admin->id,
                'title' => 'The Forsaken Hollows',
                'content' => 'The Forsaken Hollows DLC launches December 4 2025, for all platforms, introducing new areas (Limveld).',
                'publication_date' => Carbon::parse('2026-01-03'),
                'image' => null,
            ],
        ];

        foreach ($news as $item) {
            News::create($item);
        }
    }
}
