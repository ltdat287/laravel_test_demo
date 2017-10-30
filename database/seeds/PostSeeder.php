<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 10; $i++) {
        App\Post::create([
            'title' => $faker->title,
            'content' => $faker->text(200),
            'user_id' => 1
        ]);
    }
    }
}
