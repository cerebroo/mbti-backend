<?php

use App\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {

        // Truncating old data.
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Question::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Preparing for Mass Assignments.
        Model::unguard();

        $this->call(QuestionsTableSeeder::class);

        // Replacing Mass Assignment check.
        Model::reguard();
    }
}
