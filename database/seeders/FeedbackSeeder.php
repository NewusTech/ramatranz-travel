<?php

namespace Database\Seeders;

use App\Models\Feedback;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Feedback::create([
            'title' => 'Joel Ana',
            'desc'  => 'Travel amanah, terpercaya, nyaman dan berkelas dengan pelayanan terbaik.',
            'image' => 'feedback/author1.jpg',
        ]);
        Feedback::create([
            'title' => 'Sylvia',
            'desc'  => 'Mobilnya bersih dan nyaman, driver sopan dan mobilnya nyaman banget.',
            'image' => 'feedback/author2.jpg',
        ]);
        Feedback::create([
            'title' => 'Atung Sanjaya',
            'desc'  => 'Pelayanan memuaskan, driver nya ramah dan sopan.',
            'image' => 'feedback/author1.jpg',
        ]);
        Feedback::create([
            'title' => 'Dhevin',
            'desc'  => 'Travel pilihan saya sih kalo ingin pulang kampung dari Jakarta ke Lampung.',
            'image' => 'feedback/author2.jpg',
        ]);
    }
}
