<?php

use App\Question;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // Change this value to make Fake Questions on dev...
        $fakeCount = 0;

        $faker = Faker::create();

        $allowedDirections = [
            Question::DIMENSION_EI,
            Question::DIMENSION_SN,
            Question::DIMENSION_TF,
            Question::DIMENSION_JP
        ];

        for ($i = 1; $i <= $fakeCount; $i++) {
            Question::create([
                'question'   => $faker->sentence,
                'dimension'  => $faker->randomElement($allowedDirections),
                'direction'  => $faker->randomElement([1, -1]),
                'sort_order' => $faker->numberBetween(101, 200)
            ]);
        }

        Question::create([
            'question'   => 'You find it takes effort to introduce yourself to other people.',
            'dimension'  => Question::DIMENSION_EI,
            'direction'  => 1,
            'sort_order' => 10
        ]);

        Question::create([
            'question'   => 'You consider yourself more practical than creative.',
            'dimension'  => Question::DIMENSION_SN,
            'direction'  => -1,
            'sort_order' => 20
        ]);

        Question::create([
            'question'   => 'Winning a debate matters less to you than making sure no one gets upset.',
            'dimension'  => Question::DIMENSION_TF,
            'direction'  => 1,
            'sort_order' => 30
        ]);

        Question::create([
            'question'   => 'You get energized going to social events that involve many interactions.',
            'dimension'  => Question::DIMENSION_EI,
            'direction'  => -1,
            'sort_order' => 40
        ]);

        Question::create([
            'question'   => 'You often spend time exploring unrealistic and impractical yet intriguing ideas.',
            'dimension'  => Question::DIMENSION_SN,
            'direction'  => 1,
            'sort_order' => 50
        ]);

        Question::create([
            'question'   => 'Deadlines seem to you to be of relative rather than absolute importance.',
            'dimension'  => Question::DIMENSION_JP,
            'direction'  => 1,
            'sort_order' => 60
        ]);

        Question::create([
            'question'   => 'Logic is usually more important than heart when it comes to making important decisions.',
            'dimension'  => Question::DIMENSION_TF,
            'direction'  => -1,
            'sort_order' => 70
        ]);

        Question::create([
            'question'   => 'Your home and work environments are quite tidy.',
            'dimension'  => Question::DIMENSION_JP,
            'direction'  => -1,
            'sort_order' => 80
        ]);

        Question::create([
            'question'   => 'You do not mind being at the center of attention.',
            'dimension'  => Question::DIMENSION_EI,
            'direction'  => -1,
            'sort_order' => 90
        ]);

        Question::create([
            'question'   => 'Keeping your options open is more important than having a to-do list.',
            'dimension'  => Question::DIMENSION_JP,
            'direction'  => 1,
            'sort_order' => 100
        ]);
    }
}
