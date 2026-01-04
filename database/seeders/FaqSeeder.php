<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;
use App\Models\FaqCategory;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $gameplayCategory = FaqCategory::where('name', 'Gameplay')->first();
        $characterCategory = FaqCategory::where('name', 'Character Creation')->first();
        $combatCategory = FaqCategory::where('name', 'Combat')->first();
        $worldCategory = FaqCategory::where('name', 'World & Exploration')->first();

        $faqs = [
            [
                'faq_category_id' => $gameplayCategory->id,
                'question' => 'What is Elden Ring?',
                'answer' => 'Elden Ring is an action role-playing game developed by FromSoftware and published by Bandai Namco Entertainment. It was created in collaboration with fantasy novelist George R. R. Martin, who provided the worldbuilding for the game.',
                'order' => 1,
            ],
            [
                'faq_category_id' => $gameplayCategory->id,
                'question' => 'Is Elden Ring difficult?',
                'answer' => 'Yes, Elden Ring follows the tradition of FromSoftware games being challenging. However, it offers more flexibility than previous titles with an open world that allows you to explore and level up before tackling difficult bosses.',
                'order' => 2,
            ],
            [
                'faq_category_id' => $characterCategory->id,
                'question' => 'What is the best starting class?',
                'answer' => 'There is no "best" starting class as it depends on your playstyle. The Vagabond is great for beginners who want a balanced melee build, while the Astrologer is good for magic users. The Wretch starts at level 1 with no equipment, offering maximum flexibility.',
                'order' => 1,
            ],
            [
                'faq_category_id' => $characterCategory->id,
                'question' => 'Can I respec my character?',
                'answer' => 'Yes, you can respec your character after defeating Rennala, Queen of the Full Moon at the Academy of Raya Lucaria. You\'ll need a Larval Tear item to respec.',
                'order' => 2,
            ],
            [
                'faq_category_id' => $combatCategory->id,
                'question' => 'What are Ashes of War?',
                'answer' => 'Ashes of War are special abilities that can be applied to weapons and shields. They allow you to customize your equipment with unique skills and change the scaling attributes of your weapons.',
                'order' => 1,
            ],
            [
                'faq_category_id' => $combatCategory->id,
                'question' => 'Should I dual wield or use a shield?',
                'answer' => 'Both are viable options. Shields provide defense and allow you to block attacks, while dual wielding (powerstancing) offers more aggressive playstyle with higher damage output. Choose based on your preferred combat style.',
                'order' => 2,
            ],
            [
                'faq_category_id' => $worldCategory->id,
                'question' => 'How do Sites of Grace work?',
                'answer' => 'Sites of Grace are checkpoints where you can rest, level up, fast travel, and allocate your Flask charges. Resting at a Site of Grace respawns most enemies but refills your health and Flask uses.',
                'order' => 1,
            ],
            [
                'faq_category_id' => $worldCategory->id,
                'question' => 'Can I explore anywhere from the start?',
                'answer' => 'Yes! Elden Ring features an open world that allows you to explore most areas from the beginning. However, some regions are locked behind story progression or defeating certain bosses.',
                'order' => 2,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
