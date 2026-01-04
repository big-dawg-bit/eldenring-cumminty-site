<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FaqCategory;

class FaqCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Gameplay', 'order' => 1],
            ['name' => 'Character Creation', 'order' => 2],
            ['name' => 'Combat', 'order' => 3],
            ['name' => 'World & Exploration', 'order' => 4],
            ['name' => 'Technical Issues', 'order' => 5],
        ];

        foreach ($categories as $category) {
            FaqCategory::create($category);
        }
    }
}
